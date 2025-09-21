<?php

namespace App\Http\Middleware\OAuth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CustomGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $parameters = [
            'clientId' => $request->client_id,
            'redirect_uri' => $request->redirect_uri,
            'response_type' => $request->response_type,
            'scope' => $request->scope,
            'state' => $request->state,
            'passport' => true
        ];

        if (!activeGuard()) {
            Log::info("No hay login | OAuth");
            switch ($request->guard) {
                case 'student':
                    session(['passport.guard' => 'student']);
                    return redirect()->route('login.student', parameters: $parameters);
                    break;
                case 'teacher':
                    session(['passport.guard' => 'teacher']);
                    Log::info("OAuth");
                    return redirect()->route('login.teacher', parameters: $parameters);

                    break;
                case 'developer':
                    session(['passport.guard' => 'developer']);
                    return redirect()->route('login.developer', parameters: $parameters);
                    break;
                default:
                    session(['passport.guard' => 'student']);
                    return redirect()->route('login.student', parameters: $parameters);
                    break;
            }
        }

        return $next($request);
    }
}
