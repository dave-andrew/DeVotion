<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\Request;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\View\View;
use \Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function viewLogin(): View
    {
        return view('pages.login');
    }

    public function viewRegister(): View
    {
        return view('pages.register');
    }

    public function login(Request $request)
    {
        $validation = [
            'email' => 'required',
            'password' => 'required',
        ];
        $messages = [
            'email.required' => 'Email must be filled',
            'password.required' => 'Password must be filled',
        ];

        $validate = Validator::make($request->all(), $validation, $messages);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $remember = (bool)$request->input('remember');

        $isLogin = Auth::attempt($data, $remember);

        if ($isLogin) {
            $user = Auth::user();
            if($user->workspaces->isEmpty()) {
                return redirect()->route('viewCreateWorkspace.type');
            }
            return redirect()->route('viewWorkspace', [$user->workspaces->first()->id]);
        }

        return back()->withErrors([
            'email' | 'password' => 'The provided credentials do not match our records.'
        ])->withInput();
    }

    public function register(Request $request)
    {
        $validation = [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];

        $messages = [
            'username.required' => 'Username must be filled',
            'username.string' => 'Username must be a string',
            'username.max' => 'Username length must be lower than 255',
            'email.required' => 'Email must be filled',
            'email.string' => 'Email must be a string',
            'email.max' => 'Email length must be lower than 255',
            'email.unique' => 'Email has been taken',
            'password.required' => 'Password must be filled',
            'password.string' => 'Password must be a string',
            'password.min' => 'Password length must be at least 8',
            'password.confirmed' => 'Password and confirm password does not match'
        ];

        $validate = Validator::make($request->all(), $validation, $messages);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        Auth::login($user);

        return redirect()->route('viewCreateWorkspace.type');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('viewLogin');
    }
}
