<?php

namespace App\Http\Middleware;

use Closure;

class UserReference
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
        if($request->has('ref')){
          \Illuminate\Support\Facades\Cookie::queue(
            \Illuminate\Support\Facades\Cookie::forever('ref', request('ref'))
          );
        }
        return $next($request);
    }
}
