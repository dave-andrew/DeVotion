<?php

namespace App\Http\Controllers;

use App\Events\NoteEdit;
use App\Models\Note;
use App\Models\Notedetail;
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

        return redirect()->route('viewWorkspaceNote', ['workspace_id' => $request->workspace_id, 'note_id' => $note->id]);
    }

    public function update(Request $request)
    {
        $note = Note::find($request->note_id);
        $workspace = Workspace::find($request->workspace_id);

        if(Gate::denies('note-update', $workspace)) {
            return redirect()->back()->withErrors('You are not authorized to update this note.');
        }

        $note->title = $request->title;
        $note->save();

        $details = $note->notedetails;
        $details->content = $request->contents;
        $details->order = $request->order;
        $details->type = $request->type;
        $details->save();

        return redirect()->back()->with('success', 'Note updated successfully.');
    }

    public function delete(Request $request)
    {
        $note = Note::find($request->note_id);
        $workspace = Workspace::find($request->workspace_id);

        if(Gate::denies('note-delete', $workspace)) {
            return redirect()->back()->withErrors('You are not authorized to delete this note.');
        }

        $teamspace = $note->teamspace;

        $note->delete();

        if($teamspace->notes->count() == 0) {
            $teamspace->delete();
        }

        return redirect()->route('viewWorkspace', $request->workspace_id);
    }

    public function duplicate(Request $request)
    {
        $note = Note::find($request->note_id);

        $newNote = new Note();
        $newNote->title = $note->title;
        $newNote->teamspace_id = $note->teamspace_id;
        $newNote->save();

        $notedetail = $note->notedetails;

        if(!$notedetail) {
            return redirect()->back()->with('success', 'Note duplicated successfully.');
        }

        foreach ($notedetail as $detail) {
            $newDetail = new Notedetail();
            $newDetail->note_id = $newNote->id;
            $newDetail->content = $detail->content;
            $newDetail->type = $detail->type;
            $newDetail->order = $detail->order;
            $newDetail->save();
        }

        $newNote->save();

        return redirect()->back()->with('success', 'Note duplicated successfully.');
    }
}
