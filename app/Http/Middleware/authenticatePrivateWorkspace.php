<?php

namespace App\Http\Middleware;

use App\Models\Workspace;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authenticatePrivateWorkspace
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
                return redirect()->route('home');
            }

            if($request->username != Auth::user()->username) {
//                TODO: keknya dikasi error message + toast gacor

                return redirect()->back();
            }

            $userRole = $workspace->users()->where('username', Auth::user()->username)->first()->pivot->role ?? null;

            if($userRole != 'owner' && $workspace->type != "personal") {
                return redirect()->back();
            }
        }

        return $next($request);
    }
}
