<?php

namespace App\Http\Middleware;

use Closure;
use Visitor;

class Analytics
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
        Visitor::log();
        return $next($request);
    }
}
