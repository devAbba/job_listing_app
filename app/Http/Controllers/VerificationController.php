<?php

namespace App\Http\Controllers;

use App\Events\VerifiedUser;
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

        event(new VerifiedUser(auth()->user()));
        return redirect('/')->with('success', "Email Verified");
    }

    /**
     * Resend verification email
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function sendMail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Verification link sent!');
    }
}
