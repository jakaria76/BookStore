<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException; 

class LoginRequest extends FormRequest
{
    /**
     * Check kore je user ki ei request ta korte parbe?
     */
    public function authorize(): bool
    {
        return true; // By default, shobai request korte parbe
    }

    /**
     * Login request er jonno validation rules gulo define kora.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'], // Email ta valid format e hote hobe
            'password' => ['required', 'string'], // Password ta string hote hobe
        ];
    }

    /**
     * User authentication er attempt neoa hoy.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited(); // Rate limit check kora hocche

        // User jodi email & password thik moto na dey, tahole login fail korbe
        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey()); // Rate limiter count baray dibe

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'), // Error message dekhabe
            ]);
        }

        RateLimiter::clear($this->throttleKey()); // Successful login e rate limit reset hobe
    }

    /**
     * Rate limit check kore je request ta ki beshi bar try hocche.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        // Jodi ek jon user 5 bar login fail kore tahole rate limit apply hobe
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this)); // User ke lockout korar jonno event dispatch kora

        $seconds = RateLimiter::availableIn($this->throttleKey()); // Koto second pore abar try korte parbe

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds, // Remaining seconds count
                'minutes' => ceil($seconds / 60), // Remaining minutes count
            ]),
        ]);
    }

    /**
     * Rate limiter er throttle key generate kore.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')).'|'.$this->ip());
        // Email ar IP er combination diye unique key generate kora hocche
    }
}
