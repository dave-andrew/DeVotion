<?php

namespace App\Http\Controllers;

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

        if(!$request->type) {
            return redirect()->route('viewCreateWorkspace.type');
        }

        return view('pages.workspace-detail')->with(['type'=>$request->type]);
    }

    public function get() {
        $workspaces = Workspace::find(auth()->user()->pluck('id'));
        return view('pages.workspaces', compact('workspaces'));
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

            DB::commit();

            return redirect()->route('home')->with('success', 'Workspace created successfully.');

        } catch (\Exception $e) {
            DB::rollBack();

            dd($e);

            return redirect()->back()->withErrors('There was an error creating the workspace. Please try again.')->withInput();
        }
    }


}
