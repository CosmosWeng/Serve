<?php

namespace App\Http\Middleware;

use Closure;

class DynamicRoute
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
        var_dump($next);
        exit;
        return $next($request);
    }
}
