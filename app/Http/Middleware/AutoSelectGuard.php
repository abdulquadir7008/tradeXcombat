<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AutoSelectGuard
{
    public function handle($request, Closure $next)
    {
        if ($request->is('api/*')) {
            config(['auth.defaults.guard' => 'api']);
        } else {
            config(['auth.defaults.guard' => 'web']);
        }

        return $next($request);
    }
}
