<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Notedetail;
use App\Models\Teamspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamspaceController extends Controller
{

    public function create(Request $request) {

        try {
            DB::beginTransaction();

            $teamspace = new Teamspace();
            $teamspace->name = $request->name;
            $teamspace->permission = $request->permission;
            $teamspace->workspace_id = $request->workspace_id;
            $teamspace->save();

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

        } catch(\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create teamspace');
        }



        return redirect()->route('viewWorkspace', ['workspace_id' => $request->workspace_id]);
    }

}
