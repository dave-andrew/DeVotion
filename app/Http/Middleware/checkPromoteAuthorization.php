<?php

namespace App\Http\Middleware;

use App\Models\Workspace;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class checkPromoteAuthorization
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
        $role = strtolower($request->role);
        $workspace = Workspace::find($request->workspace_id);

        if($role == 'owner' && Gate::allows('user-isOwner', $workspace)) {
            return $next($request);
        }

        if(($role == 'admin' || $role == 'member') && Gate::allows('user-isAdminOrOwner', $workspace)) {
            return $next($request);
        }

        return redirect()->back()->withErrors('You are not authorized to perform this action.');
    }
}
