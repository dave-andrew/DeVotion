<?php

namespace App\Http\Middleware;

use App\Models\Note;
use App\Models\Teamspace;
use App\Models\Workspace;
use Closure;
use Illuminate\Http\Request;

class checkCreateNoteAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $workspace = Workspace::find($request->workspace_id);

        if(!$workspace) {
            return redirect()->back()->withErrors('Something went wrong, please try again.');
        }

        $teamspace = Teamspace::find($request->teamspace_id);
        $data = $workspace->users->find(auth()->user()->id);

        if($teamspace->permission == 'public') {
            return $next($request);
        } else if($teamspace->permission == 'private') {
            if($data->pivot->role == 'owner') {
                return $next($request);
            }
        } else if($teamspace->permission == 'default') {
            if($data->pivot->role == 'owner' || $data->pivot->role == 'admin') {
                return $next($request);
            }
        }
        return redirect()->back()->withErrors('You are not authorized to perform this action.');
    }
}
