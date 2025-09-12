<?php

namespace App\Livewire\Auth\Student;

use Illuminate\Auth\Events\Lockout;
use Livewire\Component;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Validate;


class Login extends Component
{
    #[Validate('required|int')]
    public int $document;

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (Auth::guard('student')->attempt(['document' => $this->document, 'password' => $this->password])) {
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
        return Str::transliterate(Str::lower($this->document) . '|' . request()->ip());
    }


    public function render()
    {
        return view('livewire.auth.student.login');
    }
}
