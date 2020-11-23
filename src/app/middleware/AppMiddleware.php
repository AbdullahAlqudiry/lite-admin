<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AppMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        visits(\App\Models\User::class, 'visits')->increment();

        return $next($request);
    }
}
