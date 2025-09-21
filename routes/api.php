<?php

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;



Route::get('/developers', function (Request $request) {
    return User::all();
});

Route::get('/me', function (Request $request) {
    return Auth::user();
})->middleware('auth:api-student,api-teacher,api-developer');
