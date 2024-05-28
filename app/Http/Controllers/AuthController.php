<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'The provided credentials do not match our records.'
        ]);
    }

    public function register(Request $request) {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        Auth::login($user);

        return redirect()->route('home');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('viewLogin');
    }

}
