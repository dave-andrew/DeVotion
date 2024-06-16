<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;
use App\Models\Workspaceuser;
use Illuminate\Http\Request;

class InvitationController extends Controller
{

    public function create(Request $request)
    {
        $workspace_id = $request->workspace_id;

        $user_id = User::where('email', $request->email)->first()->id;

        $invitation = new Invitation();
        $invitation->workspace_id = $workspace_id;
        $invitation->user_id = $user_id;
        $invitation->invited_by = auth()->id();
        $invitation->save();

        return redirect()->route('workspaces.show', ['workspace' => $workspace_id]);
    }

    public function accept(Request $request)
    {
        $invitation = Invitation::find($request->invitation_id);

        $workspace = $invitation->workspace;
        $user = $invitation->user;

        $workspace_user = new Workspaceuser();
        $workspace_user->user_id = $user->id;
        $workspace_user->workspace_id = $workspace->id;
        $workspace_user->role = 'member';
        $workspace_user->save();

        $invitation->delete();

        return redirect()->route('workspaces.show', ['workspace' => $workspace->id]);
    }

    public function decline(Request $request)
    {
        $invitation = Invitation::find($request->invitation_id);
        $invitation->delete();

        return redirect()->back();
    }

}
