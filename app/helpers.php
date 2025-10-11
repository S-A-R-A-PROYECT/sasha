<?php

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Picqer\Barcode\BarcodeGeneratorPNG;

if (! function_exists('metaData')) {
    function metaData()
    {
        return [
            "name" => "SASHA",
            'developer' => "Julián Ramirez",
            'project' => [
                "for" => "COLEGIO O.E.A. 2025",
                "SARA" => [
                    'developers' => ["Ramiro Soler", "Santiago Parraga", "Julian Ramirez"]
                ],
                "System SHADOW" => [
                    'developers' => ["Diyer Padilla", "Juan Pablo Gonzales", "Jeisson Polanco"]
                ]
            ],
        ];
    }
}

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


if (!function_exists('generateStudentBarCodes')) {
}
