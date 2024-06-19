<?php

namespace App\Http\Middleware;

use App\Models\Workspace;
use Closure;
use Illuminate\Http\Request;

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
        $role = $request->role;
        $workspace = Workspace::find($request->workspace_id);

        if($role == 'owner' && auth()->user()->can('user-isOwner', $workspace)) {
            return $next($request);
        }

        if(($role == 'admin' || $role == 'member') && auth()->user()->can('user-isAdminOrOwner', $request->workspace)) {
            return $next($request);
        }

        return redirect()->back()->withErrors('You are not authorized to perform this action.');
    }
}
