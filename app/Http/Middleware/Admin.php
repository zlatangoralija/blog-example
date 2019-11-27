<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Check if Auth user is admin
        if(Auth::user()->role_id == \App\User::$_ROLE_ADMIN){
            return $next($request);
        }else{
            abort(403, 'Unauthorized action.');
        }
    }
}
