<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Notedetail;
use App\Models\Teamspace;
use App\Models\Workspace;
use App\Models\Workspaceuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WorkspaceController extends Controller
{
    public function workspaceType()
    {
        return view('pages.workspace-type');
    }

    public function updateWorkspace(Request $request)
    {
        $workspace = Workspace::find($request->workspace_id);

        if(!$workspace) {
            return redirect()->back()->withErrors("Something isn't right, please try again later.");
        }

        $validate = Validator::make(
            $request->all(),
            [
                'workspaceName' => 'required|string|max:255',
            ],
            [
                'workspaceName.required' => 'Workspace name is required.',
                'workspaceName.string' => 'Workspace name must be a string.',
                'workspaceName.max' => 'Workspace name must not exceed 255 characters.',
            ]
        );

        if($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }

        if($workspace->name == $request->workspaceName) {
            return redirect()->back()->withErrors('Workspace name is the same as the current name.');
        }

        $workspace->name = $request->workspaceName;
        $workspace->save();

        return redirect()->back()->with('success', 'Workspace updated successfully.');
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

        return view('pages.notes', compact('workspaces'));
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
            return redirect()->route('viewCreateWorkspace.detail')
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
            $teamspace->workspace_id = $workspace->id;
            $teamspace->name = 'Private';
            $teamspace->permission = 'private';
            $teamspace->save();

            $note = new Note();
            $note->teamspace_id = $teamspace->id;
            $note->title = 'Welcome to your workspace!';
            $note->save();

            $notedetail = new Notedetail();
            $notedetail->note_id = $note->id;
            $notedetail->content = 'This is your starting notedetail to learn what our feature is!';
            $notedetail->type = 'text';
            $notedetail->order = 0;
            $notedetail->save();

            DB::commit();

            return redirect()
                ->route('viewWorkspace', $workspace->id)
                ->with('success', 'Workspace created successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('viewCreateWorkspace.type')->withErrors('There was an error creating the workspace. Please try again.')->withInput();
        }
    }

    public function viewWorkspace(Request $request)
    {
        $workspace = Workspace::find($request->workspace_id);

        if(!$workspace) {
            return redirect()->route('viewCreateWorkspace.type');
        }

        $note = $workspace->teamspaces->first()->notes->first();

        return view('pages.note', compact('workspace', 'note'));
    }

    public function deleteWorkspace(Request $request) {
        if(Auth::user()->workspaces->count() == 1) {
            return redirect()->route('viewWorkspace', [Auth::user()->workspaces->first()->id])->withErrors('You cannot delete the last workspace.');
        }

        Workspace::destroy($request->workspace_id);

        return redirect()->route('viewWorkspace', [Auth::user()->workspaces->first()->id]);
    }
}
