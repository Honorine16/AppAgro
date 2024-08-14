<?php

use App\Http\Controllers\AnotherController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// route permettant de rediriger vers la page de connexion
Route::get('/', [AnotherController::class, 'login'])->name('login');

// route permettant de rediriger vers la page de connexion
Route::get('/login', [AnotherController::class, 'login'])->name('login');

// route permettant de rediriger vers la page de d'inscription
Route::get('/registration', [AnotherController::class, 'registration'])->name('registration');

// route permettant de rediriger vers la page de déconnexion
Route::get('/logout', [AnotherController::class, 'logout'])->name('logout');

// route permettant de rediriger vers la page d'accueil et le middleware permet de s'authentifier
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AnotherController::class, 'index'])->name('dashboard');
});

Route::get('/forgottenPassword', [AnotherController::class, 'forg_password'])->name('forgottenPassword');
Route::get('/otp-code', [AnotherController::class, 'otp_code-fun'])->name('otpCode');
Route::get('/new-password', [AnotherController::class, 'new_password_fun'])->name('newPassword');

Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration.process');
Route::post('/forgotten-password', [AuthController::class, 'forgottenPassword'])->name('forgottenPassword.process');
Route::post('/otp-code', [AuthController::class, 'checkOtpCode'])->name('otpCode.process');
Route::post('/new-password', [AuthController::class, 'newPassword'])->name('newPassword.process');