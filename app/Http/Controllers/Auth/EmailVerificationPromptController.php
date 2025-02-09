<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Email verification prompt dekhabe.
     *
     * Ei method ta check korbe je user tar email verify koreche ki na.
     * Jodi verify kora thake, tahole home page e redirect korbe.
     * Na hole "verify email" page ta show korbe.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        return $request->user()->hasVerifiedEmail()
            // Jodi user er email verify kora thake
            ? redirect()->intended(RouteServiceProvider::HOME) // Tahole take home page e pathabe
            : view('auth.verify-email'); // Na hole "Verify Email" page ta dekhabe
    }
}
