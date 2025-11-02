<?php

namespace App\Livewire\Auth\Developer;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Models\Passport\Client;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;

class Login extends Component
{

    #[Validate('required|email')]
    public int $email;

    #[Validate('required|string')]
    public string $password = '';
    public bool $remember = false;

    #[Url]
    public $clientId;
    #[Url]
    public $redirect_uri;
    #[Url]
    public $response_type;
    #[Url]
    public $scope;
    #[Url]
    public $state;
    #[Url]
    public $passport;
    public $client;

    public function mount()
    {
        $this->client = Client::findOrFail($this->clientId) ?? null;
    }

    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (Auth::guard('developer')->attempt(['email' => $this->email, 'password' => $this->password])) {
            RateLimiter::clear($this->throttleKey());
            request()->session()->regenerate();


            if ($this->passport) {
                $param = [
                    'client_id' => $this->clientId,
                    'redirect_uri' => $this->redirect_uri,
                    'response_type' => $this->response_type,
                    'scope' => $this->scope,
                    'state' => $this->state,
                ];

                $this->redirectRoute('passport.authorizations.authorize', parameters: $param);
            } else {
                $this->redirectIntended(default: route('home', absolute: false), navigate: true);
            }
        }
        RateLimiter::hit($this->throttleKey());

        throw ValidationException::withMessages([
            'document' => __('auth.failed'),
        ]);
    }

    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'document' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }


    public function render()
    {
        return view('livewire.auth.developer.login');
    }
}
