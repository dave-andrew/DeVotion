<?php

namespace App\Http\Controllers;

use App\Events\NoteDetailAdded;
use App\Events\NoteDetailDeleted;
use App\Events\NoteEdit;
use App\Models\Note;
use App\Models\Notedetail;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Monolog\Logger;

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

        NoteEdit::dispatch($note, $note->notedetails);

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $note = Note::find($request->note_id);
        $workspace = Workspace::find($request->workspace_id);

        $teamspace = $note->teamspace;

        if(Gate::denies('note-delete', $workspace)) {
            return redirect()->back()->withErrors('You are not authorized to delete this note.');
        }

        if($teamspace->notes->count() == 1 && $workspace->teamspaces->count() == 1) {
            return redirect()->back()->withErrors('You cannot delete the last note in a workspace.');
        }

        $note->delete();

        if($teamspace->notes->count() - 1 == 0) {
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

    public function addNoteDetail(Request $request)
    {
        $note = Note::find($request->note);

        if (!$note) {
            return redirect()->back()->with('error', 'Note not found.');
        }

        DB::beginTransaction();

        try {
            $detail = new Notedetail();
            $detail->note_id = $note->id;
            $detail->content = "";
            $detail->type = "text";
            $detail->order = 0;
            $detail->save();

            DB::commit();

            return redirect()->back()->with('success', 'Note detail added successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', 'Failed to add note detail.');
        }
    }

    public function deleteNoteDetail(Request $request)
    {
        $detail = Notedetail::find($request->note_detail_id);

        if (!$detail) {
            return redirect()->back()->with('error', 'Note detail not found.');
        }

        DB::beginTransaction();

        $detail->delete();

        DB::commit();

        return redirect()->back()->with('success', 'Note detail deleted successfully.');
    }
}
