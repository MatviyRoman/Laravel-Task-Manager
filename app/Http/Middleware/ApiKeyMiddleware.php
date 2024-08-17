<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Middleware to validate API key.
 *
 * This middleware checks if the request contains a valid API key in the header.
 * If the API key does not match the configured key, the request is denied with a 401 Unauthorized response.
 */
class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request The incoming request instance.
     * @param Closure $next The next middleware or request handler in the pipeline.
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response The response from the next middleware or a 401 Unauthorized response.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the API key in the request header matches the configured API key
        if ($request->header('x-api-key') !== config('app.api_key')) {
            // Return a 401 Unauthorized response if the keys do not match
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Proceed to the next middleware or request handler if the API key is valid
        return $next($request);
    }
}
