<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Permitir el acceso desde todos los dominios
        $response->header('Access-Control-Allow-Origin', '*');
        // Permitir métodos HTTP específicos
        $response->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        // Permitir encabezados personalizados y cookies
        $response->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-CSRF-TOKEN');

        return $response;
    }
}
