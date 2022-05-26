<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
class AuthApi
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
        $access_token = $request->header('Authorization');
        if(!$access_token) {
            return response('Unautorized.', 401);
        }

        $user = User::whereAccess_token($access_token)->first();
        if(!$user) {
            return response('Unautorized.', 401);
        }

        return $next($request);
    }
}
