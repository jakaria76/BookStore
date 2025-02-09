<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User; // User model ta use kora hoise
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered; // User register event handle korar jonno
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // User login korar jonno Auth facade use kora hoise
use Illuminate\Support\Facades\Hash; // Password securely hash korar jonno
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Registration form show korbe.
     *
     * Ei method ta registration page ta user er kase dekhabe.
     */
    public function create(): View
    {
        return view('auth.register'); // resources/views/auth/register.blade.php file ta load korbe
    }

    /**
     * User er registration handle korbe.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // **Form validation**: Ei validation check korbe je:
        // 1. Name, email, password gulo thik ache ki na
        // 2. Email unique ache ki na
        // 3. Password confirm field match kore ki na
        $request->validate([
            'name' => ['required', 'string', 'max:255'], // Name required, string type hote hobe, max length 255
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class], // Unique email hote hobe
            'password' => ['required', 'confirmed', Rules\Password::defaults()], // Password confirm korte hobe
        ]);

        // **User create kora**: Form theke data collect kore user create korbe
        $user = User::create([
            'name' => $request->name, // User er nam database e save korbe
            'email' => $request->email, // User er email save korbe
            'password' => Hash::make($request->password), // Password hash kore securely store korbe
        ]);

        // **User registered event fire kore**
        event(new Registered($user)); // Laravel er built-in event, jei email verification ba onno process trigger korte pare

        // **User ke automatically login korano**
        Auth::login($user); // Registration er por direct login kore dibe

        // **Home page e redirect korbe**
        return redirect(RouteServiceProvider::HOME);
    }
}
