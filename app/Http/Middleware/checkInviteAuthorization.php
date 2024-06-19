<?php

namespace App\Http\Middleware;

use App\Models\Workspace;
use Closure;
use Illuminate\Http\Request;

class checkInviteAuthorization
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

        $data = $workspace->users->find(auth()->user()->id);

        if($data->pivot->role == 'owner' || $data->pivot->role == 'admin') {
            return $next($request);
        }

        return redirect()->back()->withErrors('You are not authorized to perform this action.');
    }
}
