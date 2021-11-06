<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isModerator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session('isAdmin') != 2) {
            return redirect('/')->with('fail', 'You are not Moderator ! ');
        }
        return $next($request);
    }
}
