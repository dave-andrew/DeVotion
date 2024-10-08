<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkIsOwner
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
        if(auth()->user()->role != 'owner') {
            return redirect()->back()->withErrors('You are not authorized to perform this action.');
        }

        return $next($request);
    }
}
