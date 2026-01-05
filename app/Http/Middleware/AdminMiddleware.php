<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Ensures that only authenticated users with 'admin' role can access protected routes.
     * Logs unauthorized access attempts and returns appropriate responses based on request type.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Log unauthorized access attempt
        Log::warning('Unauthorized access attempt to admin route', [
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
            'user_id' => auth()->id() ?? 'guest',
        ]);

        // Return appropriate response based on request type
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthorized. Admin access required.'], 403);
        }

        return redirect('/')->with('error', 'You do not have permission to access this page.');
    }
}