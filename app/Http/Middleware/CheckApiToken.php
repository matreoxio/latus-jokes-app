<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Extract the Bearer token from the "Authorization" header
        $authHeader = $request->header('Authorization');

        if (! $authHeader || ! str_starts_with($authHeader, 'Bearer ')) {
            return response()->json(['message' => 'No token provided'], 401);
        }

        // remove "Bearer "
        $token = substr($authHeader, 7);

        // Compare with your global token from .env
        if ($token !== config('services.api_token')) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // If it matches, allow the request through
        return $next($request);
    }
}
