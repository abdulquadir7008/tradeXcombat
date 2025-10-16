<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth; // Add this import
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class JWT
{
    public function handle(Request $request, Closure $next): Response
{
    // List of routes that should NOT require a token
    $publicRoutes = ['api/register', 'api/login'];

    if (in_array($request->path(), $publicRoutes)) {
        return $next($request);
    }

    try {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['error' => 'User not found'], 404);
        }
    } 
    catch (TokenExpiredException $e) {
        return response()->json(['error' => 'Token has expired'], 401);
    } 
    catch (TokenInvalidException $e) {
        return response()->json(['error' => 'Token is invalid'], 401);
    } 
    catch (JWTException $e) {
        return response()->json(['error' => 'Token is required'], 401);
    }

    return $next($request);
}
}