<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticatedAny
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $guards = ['student', 'teacher', 'developer', 'web'];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect()->route('home')
                    ->with('error', 'Ya tienes una sesión activa.');
            }
        }

        return $next($request);
    }
}
