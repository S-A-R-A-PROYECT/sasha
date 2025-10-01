<?php

use App\Http\Controllers\Api\DeveloperController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Middleware\CheckToken;




Route::apiResource('developers', DeveloperController::class)
    ->only(['index', 'show'])
    ->middleware([CheckToken::using('developers:read')]);

Route::apiResource('teachers', TeacherController::class)
    ->only(['index', 'show'])
    ->middleware([CheckToken::using('teachers:read')]);

Route::apiResource('students', StudentController::class)
    ->only(['index', 'show'])
    ->middleware([CheckToken::using('students:read')]);

Route::get('/me', [UserController::class, 'show'])
    ->middleware('auth:api-student,api-teacher,api-developer');
