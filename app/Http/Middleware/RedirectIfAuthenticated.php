<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
//    public function handle($request, Closure $next, $guard = null)
//    {
//        if (Auth::guard($guard)->check()) {
//            return redirect(RouteServiceProvider::HOME);
//        }
//
//        return $next($request);
//    }
    
     public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {            
            $prefix = Auth::guard($guard)->user()->dashboard;            
            return redirect("/$prefix/home");
        }
       
        return $next($request);
    }
}
