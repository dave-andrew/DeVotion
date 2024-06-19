<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkUserIsOwner
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

        if(auth()->user()->workspaces->find($request->workspace_id)->pivot->role != 'owner') {
            return redirect()->back();
        }

        return $next($request);
    }
}
