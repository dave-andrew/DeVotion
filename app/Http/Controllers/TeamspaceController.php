<?php

namespace App\Http\Controllers;

use App\Models\Teamspace;
use Illuminate\Http\Request;

class TeamspaceController extends Controller
{
    
    public function create(Request $request) {
        $teamspace = new Teamspace();
        $teamspace->name = $request->name;
        $teamspace->permission = $request->permission;
        $teamspace->workspace_id = $request->workspace_id;
        $teamspace->save();
        return redirect()->route('viewWorkspace', ['workspace_id' => $request->workspace_id]);
    }

}
