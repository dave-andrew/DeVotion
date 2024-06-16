<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;
use App\Models\Workspaceuser;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class InvitationController extends Controller
{

    public function create(Request $request)
    {
        $workspace_id = $request->workspace_id;

        $user = User::where('email', $request->email)->first();

        if(!$user) {
            return redirect()->back()->withErrors('User not found');
        }


        try{
            $invitation = new Invitation();
            $invitation->workspace_id = $workspace_id;
            $invitation->user_id = $user->id;
            $invitation->invited_by = auth()->id();
            $invitation->save();
        }catch (QueryException $e){
            if ($e->errorInfo[1] == 1062) {
                if (str_contains($e->errorInfo[2], 'unique_invitation') !== false) {
                    return redirect()->back()
                        ->withErrors('User already invited');
                }
            }

            return redirect()->back()->withErrors('User not found');
        }

        return redirect()->back();
    }

    public function accept(Request $request)
    {
        $invitation = Invitation::find($request->invitation_id);

        if(!$invitation) {
            return redirect()->back()->withErrors('Hmm, something went wrong. Please try again.');
        }

        $workspace = $invitation->workspace;
        $user = $invitation->user;

        $workspace_user = new Workspaceuser();
        $workspace_user->user_id = $user->id;
        $workspace_user->workspace_id = $workspace->id;
        $workspace_user->role = 'member';
        $workspace_user->save();

        $invitation->delete();

        return redirect()->back();
    }

    public function decline(Request $request)
    {
        $invitation = Invitation::find($request->invitation_id);
        $invitation->delete();

        return redirect()->back();
    }

}
