<?php

use App\Http\Middleware\RedirectIfAuthenticatedAny;
use App\Livewire\Auth\Developer\Login as DeveloperLogin;
use App\Livewire\Auth\Student\Login as StudentLogin;
use App\Livewire\Auth\Teacher\Login as TeacherLogin;
use App\Livewire\Home;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;


Route::get('/', Home::class)->name('home')->middleware('auth:student,teacher,developer');


// Inicios de sesion
Route::prefix('/login')->group(function () {
    Route::get('/student', StudentLogin::class)->name('login.student');
    Route::get('/teacher', TeacherLogin::class)->name('login.teacher');
    Route::get('/admin', DeveloperLogin::class)->name('login.developer');
})->middleware(RedirectIfAuthenticatedAny::class);



// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::redirect('settings', 'settings/profile');

//     Route::get('settings/profile', Profile::class)->name('settings.profile');
//     Route::get('settings/password', Password::class)->name('settings.password');
//     Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
// });

require __DIR__ . '/auth.php';

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
