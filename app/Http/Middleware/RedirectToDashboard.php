<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectToDashboard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check())
            return redirect('/login');
        else
        {                       
            $prefix = Auth::guard($guard)->user()->dashboard;              
            if($request->route()->getPrefix() != "/$prefix")
                return redirect("/$prefix/home");
        }        
        return $next($request);
    }
}