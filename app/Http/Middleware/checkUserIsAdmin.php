<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkUserIsAdmin
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

        $role = auth()->user()->workspaces->find($request->workspace_id)->pivot->role;

        if($role == 'admin' || $role == 'owner') {
            return $next($request);
        }

        return redirect()->back()->withErrors('You are not allowed to do this action');
    }
}
