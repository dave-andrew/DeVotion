<?php

namespace App\Http\Controllers;

use App\Models\Workspaceuser;
use Illuminate\Http\Request;

class WorkspaceuserController extends Controller
{
    public function promote(Request $request)
    {
        $user_id = $request->user_id;
        $workspace_id = $request->workspace_id;
        $role = strtolower($request->role);

        $workspaceuser = Workspaceuser::where('user_id', $user_id)
            ->where('workspace_id', $workspace_id)
            ->first();

        if(!$workspaceuser) {
            return redirect()->back()->withErrors('User not found');
        }

        $workspaceuser->role = $role;
        $workspaceuser->save();

        return redirect()->back();
    }
}
