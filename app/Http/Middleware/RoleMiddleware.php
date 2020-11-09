<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware
{

    public function handle($request, Closure $next)
    {
        if(Auth::user() != null){
            return $next($request);
        }
        Auth::logout();
        return redirect('/login');
    }
}
