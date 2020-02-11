<?php

namespace App\Http\Middleware;

use Closure;

class RoleAdministrator
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
        if(\Auth::user()->level->level == "Administrator"){
            return $next($request);
        }
        else{
            abort(404);
        }
    }
}
