<?php

namespace App\Http\Middleware\OAuth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetPassportGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('passport.guard')) {
            config(['passport.guard' => session('passport.guard')]);
        }


        return $next($request);
    }
}
