<?php

namespace App\Http\Middleware;

use Closure;

class StartNativeSession
{
    public function handle($request, Closure $next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        return $next($request);
    }
}
