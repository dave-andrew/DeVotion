<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user->password = bcrypt($request->password);
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
