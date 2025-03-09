<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Login page dekhabe.
     *
     * Ei method ta login page ta user er kase show korbe.
     */
    public function create(): View
    {
        return view('auth.login'); // resources/views/auth/login.blade.php file ta load korbe
    }

    /**
     * Login request handle korbe.
     *
     * Ei method ta form er data check kore user ke login korbe
     * ar tarpor take intended page e redirect korbe.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate(); // LoginRequest er authenticate() method call kore user er info check korbe

        $request->session()->regenerate(); // Session regenerate kore, jate security threat (session fixation) na thake

        return redirect()->intended(RouteServiceProvider::HOME); // Successfully login hole intended page e pathabe,home page e pathabe
    }

    /**
     * Logout korar jonno.
     *
     * Ei method ta user ke logout korbe, session data shorabe,
     * nijossho security er jonno session token regenerate korbe,
     * ar user ke home page e pathabe.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout(); // Current user ke logout kore dibe

        $request->session()->invalidate(); // Session data invalid kore dibe, jate security threat na thake

        $request->session()->regenerateToken(); // CSRF attack prevent korar jonno new session token create korbe

        return redirect('/'); // Logout er pore home page e pathabe
    }
}
