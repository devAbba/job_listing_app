<?php

namespace App\Http\Controllers;

use App\Events\UserCreated;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    // signup page
    public function signup(): View
    {
        return view('users.signup');
    }

    // save new user
    public function store(Request $request)
    {
        $form_fields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        // hash password
        $form_fields['password'] = bcrypt($form_fields['password']);

        // create user
        $user = User::create($form_fields);
        if (!$user) {
            abort(500, "Something went wrong");
        }

        //fire userCreated event
        event(new UserCreated($user));

        // login
        auth()->login($user);

        return redirect('/')->with('success', "user created and logged in");
    }

    // show login form
    public function login(): View
    {
        return view('users.login');
    }

    // authenticate and login user
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

    // logout user
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', "you have been logged out");
    }
}
