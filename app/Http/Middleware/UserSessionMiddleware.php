<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class UserSessionMiddleware
{
    public function handle($request, Closure $next)
    {
        // Verifica si hay información del usuario en la sesión personalizada
        if (!Session::has('user_sessions')) {
            Session::put('user_sessions', []);
        }

        return $next($request);
    }
}
