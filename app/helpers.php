<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

if (! function_exists('activeGuard')) {
    function activeGuard()
    {
        // dd(Auth::guard('student')->check());
        foreach (array_keys(config('auth.guards')) as $guard) {
            if (Auth::guard($guard)->check()) return $guard;
        }
        Log::info("No hubo Login | helper");
        return null;
    }
}

if (!function_exists('activeUser')) {
    function activeUser()
    {
        if (session("passport.guard")) {
            return Auth::guard(session("passport.guard"))->user();
        } else {
            return Auth::user();
        }
    }
}

if (! function_exists('scopeTitle')) {
    function scopeTitle(string $id): string
    {
        $map = [
            'students:read' => 'Estudiantes - Leer',
            'teachers:read' => 'Profesores - Leer',
            'developers:read' => 'Desarrolladores - Leer',
            'user' => 'Perfil',
            'email' => 'Correo',
        ];

        return $map[$id] ?? ucfirst(str_replace(':', ' ', $id));
    }
}
