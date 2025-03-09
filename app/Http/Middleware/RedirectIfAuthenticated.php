<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider; // Route er constant gula use korar jonno
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // User authentication check korar jonno

class RedirectIfAuthenticated
{
    /**
     * Ei method ta request handle kore.
     *
     * Jodi user already login kora thake, tahole take home page e pathiye dibe.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards  // Authentication guard gula define kore
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // Jodi kono guard define na kora thake, tahole default `[null]` use korbe
        $guards = empty($guards) ? [null] : $guards;

        // Prottekta guard check kore je user logged in ache ki na
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) { // Jodi login kora thake
                return redirect(RouteServiceProvider::HOME); // Home page e pathiye dibe
            }
        }

        // Jodi user login na thake, tahole request normal bhabe ageiye jabe
        return $next($request);
    }
}
