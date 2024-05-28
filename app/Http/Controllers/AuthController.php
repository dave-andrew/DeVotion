<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\View\View;
use \Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function viewLogin(): View
    {
        return view('login');
    }

    public function viewRegister(): View
    {
        return view('register');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        $remember = (bool)$request->input('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'The provided credentials do not match our records.'
        ]);
    }

}
