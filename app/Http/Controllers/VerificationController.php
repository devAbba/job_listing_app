<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /**
     * Display email verification notice
     *
     * @return \Illuminate\Http\Response
     */
    public function notice(Request $request)
    {
        return view('auth.verify-email');
    }

    /**
     * Verify user email
     *
     * @param \Illuminate\Http\EmailVerificationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/')->with('success', "Email Verified");
    }

    /**
     * Resend verification email
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function sendMail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Verification link sent!');
    }
}
