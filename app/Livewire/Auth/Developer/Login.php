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

    #[Validate('required|int|email')]
    public int $email;

    #[Validate('required|string')]
    public string $password = '';

    #[Url]
    public $clientId;

    public $client;

    public function mount()
    {
        $this->client = Client::findOrFail($this->clientId) ?? '';
    }

    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (Auth::guard('developer')->attempt(['email' => $this->email, 'password' => $this->password])) {
            RateLimiter::clear($this->throttleKey());
            request()->session()->regenerate();


            $this->redirectIntended(default: route('home', absolute: false), navigate: true);
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
