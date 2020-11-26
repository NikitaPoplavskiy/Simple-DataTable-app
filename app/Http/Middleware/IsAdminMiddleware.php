<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

       if (!auth()->user()->is_admin) {
           abort(403);
       }

       return $next($request);
    }

//    private function getRequiredRoleForRoute($route)
//    {
//        $actions = $route->getAction();
//
//        return isset($actions['roles']) ? $actions['roles'] : null;
//    }
}
