<?php

namespace App\Http\Middleware;

use App\Models\Workspace;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authenticateWorkspace
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

        if($request->route('workspace_id')) {
            $workspace = Workspace::find($request->route('workspace_id'));

            if(!$workspace) {
                return redirect()->route('viewWorkspace', [Auth::user()->workspaces()->first()->id]);
            }

            if($workspace->users->contains(Auth::id())) {
                return $next($request);
            }
        }

        return redirect()->route('viewCreateWorkspace.type');
    }
}
