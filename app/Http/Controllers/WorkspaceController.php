<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Notedetail;
use App\Models\Teamspace;
use App\Models\Workspace;
use App\Models\Workspaceteam;
use App\Models\Workspaceuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isEmpty;

class WorkspaceController extends Controller
{
    public function workspaceType()
    {
        return view('pages.workspace-type');
    }

    public function workspaceDetail(Request $request)
    {
        $type = $request->type;
        if(!$type) {
            return redirect()->route('viewCreateWorkspace.type');
        }

        return view('pages.workspace-detail', compact('type'));
    }

    public function get() {
        $workspaces = Workspace::find(auth()->user()->pluck('id'));
        $users = $workspaces->users();
        $teamspaces = $workspaces->teamspaces();
        return view('pages.notes', compact('workspaces', 'users', 'teamspaces'));
    }

    public function create(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'string' => 'The :attribute field must be a string.',
            'max' => 'The :attribute field must not exceed :max characters.',
        ];

        $validation = [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'image' => 'required',
        ];

        $validated = Validator::make($request->all(), $validation, $messages);
        $type = $request->type;

        if($validated->fails()) {
            return redirect()->route('pages.workspace-detail')
                ->with('type', $type)
                ->withErrors($validated->errors())
                ->withInput();
        }

        try {
            DB::beginTransaction();

            $workspace = new Workspace();
            $workspace->name = $request->name;
            $workspace->description = $request->description;
            $workspace->type = $request->type;
            $workspace->image = $request->image;
            $workspace->save();

            $workspaceuser = new Workspaceuser();
            $workspaceuser->workspace_id = $workspace->id;
            $workspaceuser->user_id = Auth::id();
            $workspaceuser->role = 'owner';
            $workspaceuser->save();

            $teamspace = new Teamspace();
            $teamspace->permission = 'private';
            $teamspace->save();

            $workspaceteam = new Workspaceteam();
            $workspaceteam->workspace_id = $workspace->id;
            $workspaceteam->teamspace_id = $teamspace->id;
            $workspaceteam->save();

            $note = new Note();
            $note->teamspace_id = $teamspace->id;
            $note->title = 'Welcome to your workspace!';
            $note->save();

            $notedetail = new Notedetail();
            $notedetail->note_id = $note->id;
            $notedetail->content = 'This is your starting notedetail to learn what our feature is!';
            $notedetail->type = 'text';
            $notedetail->save();

            DB::commit();

            return redirect()
                ->route('viewWorkspace', [$workspace->id])
                ->with('success', 'Workspace created successfully.');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('viewCreateWorkspace.type')->withErrors('There was an error creating the workspace. Please try again.')->withInput();
        }
    }

    public function viewWorkspace(Request $request)
    {
        $workspace = Workspace::find($request->workspace_id);
        $workspaceuser = Workspaceuser::where('workspace_id', $request->workspace_id)->where('user_id', Auth::id())->first();
        $workspaceteam = Workspaceteam::where('workspace_id', $request->workspace_id)->get();

        if(!$workspace) {
            return redirect()->route('viewCreateWorkspace.type');
        }

        return view('pages.note', compact('workspace', 'workspaceuser', 'workspaceteam'));
    }

}
