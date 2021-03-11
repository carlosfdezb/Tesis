<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin_Administrativo_UtpMiddleware
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
         if (Auth::check() && (Auth::user()->rol == "0" || Auth::user()->rol == "2" || Auth::user()->rol == "5")){
            return $next($request);
        }else{
            return response()->view('errors.404');
        }
    }
}