<?php

namespace App\Http\Middleware;

use Closure;

class CheckUser
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
       if ($request->email==='user2@gmail.com') {
//           dd("Check User");
         return redirect('/sidebarAdmin');
        }

        return $next($request);
    }
}
