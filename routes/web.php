<?php

use App\Http\Controllers\BarcodeGeneratorController;
use App\Http\Middleware\RedirectIfAuthenticatedAny;
use App\Livewire\Auth\Developer\Login as DeveloperLogin;
use App\Livewire\Auth\Student\Login as StudentLogin;
use App\Livewire\Auth\Teacher\Login as TeacherLogin;
use App\Livewire\Home;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;

Route::get('/', Home::class)->name('home')->middleware('auth:student,teacher,developer');


// Inicios de sesion
Route::prefix('/login')->group(function () {
    Route::get('/student', StudentLogin::class)->name('login.student');
    Route::get('/teacher', TeacherLogin::class)->name('login.teacher');
    Route::get('/developer', DeveloperLogin::class)->name('login.developer');
})->middleware(RedirectIfAuthenticatedAny::class);


Route::get('qr-code', function () {
    $writer = new PngWriter();

    $qrCode = new QrCode(
        data: 'Julian Andres Ramirez',
        encoding: new Encoding('UTF-8'),
    );

    $logo = new Logo(
        path: public_path() . '\imgs\2-bg.png',
        resizeToWidth: 100,
    );

    $label = new Label(
        text: 'Julian Andres Ramirez',
        textColor: new Color(0, 0, 0)
    );

    $result = $writer->write($qrCode, $logo, $label);
    return response($result->getString())->header('Content-type', 'image/png');
});


// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::redirect('settings', 'settings/profile');

//     Route::get('settings/profile', Profile::class)->name('settings.profile');
//     Route::get('settings/password', Password::class)->name('settings.password');
//     Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
// });


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



require __DIR__ . '/passport.php';
require __DIR__ . '/auth.php';
