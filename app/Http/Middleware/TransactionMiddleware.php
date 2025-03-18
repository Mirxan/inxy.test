<?php

namespace App\Http\Middleware;

use Closure;

class TransactionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        return \DB::transaction(fn ()=>  $next($request));
    }
}
