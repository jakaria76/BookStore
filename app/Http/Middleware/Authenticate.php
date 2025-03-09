<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Jodi user authenticate na thake, tahole kon page e pathabe, seta define kore.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // **Check kore user JSON response expect kore ki na**
        if (! $request->expectsJson()) {
            // Jodi JSON request na hoy, tahole login page e redirect korbe
            return route('login');
        }
    }
}
