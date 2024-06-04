<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

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
}
