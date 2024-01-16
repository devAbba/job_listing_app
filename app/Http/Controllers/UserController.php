<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserController extends Controller
{
    /**
     * user registration view
     *
     * @return View
     */
    public function signup(): View
    {
        return view('users.signup');
    }

    /**
     * Function to create new user
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $form_fields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:8']
        ]);

        // hash password
        $form_fields['password'] = bcrypt($form_fields['password']);

        // create user
        $user = User::create($form_fields);
        if (!$user) {
            abort(500, "Something went wrong");
        }

        //fire user registration event
        event (new Registered($user));

        // login
        auth()->login($user);

        return redirect('/')->with('success', "user created and logged in");
    }

    /**
     * login view
     *
     * @return View
     */
    public function login(): View
    {
        return view('users.login');
    }

    /**
     * aunthentication function
     *
     * @param Request $request
     * @return void
     */
    public function authenticate(Request $request)
    {
        $form_fields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($form_fields)) {
            $request->session()->regenerate();

            return redirect('/')->with('success', "logged in successfully");
        }

        return back()->withErrors(['email' => "invalid credentials"])->onlyInput('email');
    }

    /**
     * Function to logout user
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', "you have been logged out");
    }

    /**
     * Reset password view
     *
     * @return View
     */
    public function passwordReset(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Function to send password reset email
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function passwordMail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    /**
     * View to set new password
     *
     * @param string $token
     * @return View
     */
    public function newPassword(string $token): View
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    /**
     * Fuction to reset password
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

}
