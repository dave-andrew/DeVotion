<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NoteController extends Controller
{
    public function create(Request $request) {
        $note = new Note();
        $note->title = "Untitled";
        $note->teamspace_id = $request->teamspace_id;

        $note->save();

        $workspace_id = $request->workspace_id;

        return redirect()->back()->with('workspace_id'. $workspace_id);
    }

    public function update(Request $request)
    {

    }

    public function delete(Request $request)
    {
        $note = Note::find($request->note_id);
        $workspace = Workspace::find($request->workspace_id);

        if(Gate::denies('note-delete', $workspace)) {
            return redirect()->back()->withErrors('You are not authorized to delete this note.');
        }

        $note->delete();

        return redirect()->back()->with('success', 'Note deleted successfully.');
    }
}
