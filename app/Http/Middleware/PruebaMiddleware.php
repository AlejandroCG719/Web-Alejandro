<?php

namespace App\Http\Middleware;

use Closure;

class PruebaMiddleware
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
        $route = $request->route()->action['as'];
        foreach ( $request->user()->role->permisions as $permiso){
            if ($permiso->name == $route){
                return $next($request);
            }
        }
        return response()->json(['User have not permission for this page access.']);
    }
}
