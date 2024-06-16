<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Workspaceuser;
use Illuminate\Http\Request;

class InvitationController extends Controller
{

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
