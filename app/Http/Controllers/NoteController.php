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

    public function search(Request $request)
    {
        $search = $request->search;
        $workspace_id = $request->workspace_id;

        $notes = Note::where('teamspace_id', $workspace_id)
            ->where('title', 'like', '%' . $search . '%')
            ->get();

        return view('pages.workspace', compact('notes', 'workspace_id'));
    }
}
