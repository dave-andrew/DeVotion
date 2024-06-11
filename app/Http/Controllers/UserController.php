<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function changeUsername(Request $request) {
        $user = User::find(Auth::id());

        $user->username = $request->username;
        $user->save();

        return redirect()->back();
    }

    public function changePassword(Request $request) {
        $user = User::find(Auth::id());

        if (!password_verify($request->old_pass, $user->password)) {
            return redirect()->back()->withErrors(['errors' => 'Old password is incorrect']);
        }

        $validate = Validator::make($request->all(), [
            'old_pass' => 'required|min:8',
            'new_pass' => 'required|min:8',
        ]);

        if($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }

        $user->password = bcrypt($request->new_pass);
        $user->save();

        return redirect()->back();
    }

    public function changeEmail(Request $request) {
        $user = User::find(Auth::id());
        $user->email = $request->email;
        $user->save();

        return redirect()->back();
    }

    public function deleteAccount() {

        $user = Auth::user();

        $user->delete();

        return redirect()->route('viewLogin');
    }
}
