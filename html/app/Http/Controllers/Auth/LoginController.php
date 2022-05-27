<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/Login');
    }

    public function store(Request $request)
    {
        // validate
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => 'required',
        ]);

        // login
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            // redirect
            return redirect()->intended('/');
        }

        // error
        return back()->withErrors([
            'email' => 'Email or password is invalid'
        ]);
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
