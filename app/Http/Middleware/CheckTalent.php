<?php

namespace App\Http\Middleware;

use Closure;
use Session; 

class CheckTalent
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
        if ( !Session::get("username") || !Session::get("level") || !Session::get("login") )
        {
            return redirect("/");    
        }
        return $next($request);
    }
}
