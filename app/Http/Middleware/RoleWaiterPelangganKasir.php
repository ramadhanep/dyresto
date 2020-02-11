<?php

namespace App\Http\Middleware;

use Closure;

class RoleWaiterPelangganKasir
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
        if(\Auth::user()->level->level == "Waiter" || \Auth::user()->level->level == "Owner" || \Auth::user()->level->level == "Pelanggan" || \Auth::user()->level->level == "Kasir" || \Auth::user()->level->level == "Administrator"){
            return $next($request);
        }
        else{
            abort(404);
        }
    }
}
