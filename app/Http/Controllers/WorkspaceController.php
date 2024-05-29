<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use App\Models\Workspaceteam;
use App\Models\Workspaceuser;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    public function index()
    {
        return view('pages.create-workspace');
    }

    public function get() {
        $workspaces = Workspace::find(auth()->user()->workspaceuser->pluck('id'));
        return view('pages.workspaces', compact('workspaces'));
    }

    public function create(Request $request)
    {
        $workspace = new Workspace();
        $workspace->name = $request->name;
        $workspace->description = $request->description;
        $workspace->type = $request->type;
        $workspace->save();

        $workspaceuser = new Workspaceuser();
        $workspaceuser->id = $workspace->id;
        $workspaceuser->user_id = auth()->user()->id;
        $workspaceuser->role = 'owner';
        $workspaceuser->save();

        return redirect()->route('home');
    }


}
