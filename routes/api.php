<?php

use App\Models\Teachers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;



Route::get('/users', function (Request $request) {
    return User::all()->toJson();
})->middleware(['auth:api']);

Route::get('/me', function (Request $request) {
    return User::findOrFail(Auth::id())->toJson();
})->middleware(['auth:api']);
