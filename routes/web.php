<?php

use App\Http\Controllers\Admin\AdviceController;
use App\Http\Controllers\AnotherController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DiagnosticController;
use App\Http\Controllers\Admin\FormationController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AnotherController::class, 'login'])->name('login');

Route::get('/login', [AnotherController::class, 'login'])->name('login');

Route::get('/registration', [AnotherController::class, 'registration'])->name('registration');

Route::get('/logout', [AnotherController::class, 'logout'])->name('logout');

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');




Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AnotherController::class, 'index'])->name('dashboard');

    Route::get('/weather', [WeatherController::class, 'show'])->name('menus.weather');

    Route::get('/chat', [ChatController::class, 'index'])->name(('menus.chat'));
    Route::post('/chat', [ChatController::class, 'store']);
    Route::get('/chat/users', [ChatController::class, 'showUsers'])->name('menus.list');
    Route::get('/chat/{userId}', [ChatController::class, 'showDiscussion']);

    Route::get('/chat/{userId}', [ChatController::class, 'chatWithUser'])->name('menus.send');

    Route::get('/diagnostic', [DiagnosticController::class, 'showForm'])->name('menus.diagnostic');
    Route::get('/upload-plant-image', [DiagnosticController::class, 'upload'])->name('upload.plant.image');

    Route::get('/advices', [AdviceController::class, 'index'])->name('menus.advice');

    Route::get('/formations', [FormationController::class, 'showPublic'])->name('menus.formation');
    Route::get('/formations/{formation}', [FormationController::class, 'show'])->name('menus.show');
    Route::post('/formations/{formation}/register', [FormationController::class, 'register'])->name('menus.register');


    // Route::get('/formations', [FormationController::class, 'index'])->name('menus.formation');

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Route::get('/formations', [FormationController::class, 'store'])->name('menus.formation');


    // Routes pour l’admin
    Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {});

    // Route pour les utilisateurs
    Route::get('advices', [AdviceController::class, 'showToUsers'])->name('menus.advice');


    Route::prefix('admin')->group(function () {
        // Route::post('advices', [AdviceController::class, 'store'])->name('advices.store');
        Route::post('/advices', [AdviceController::class, 'store'])->name('admin.advice.store');

        Route::get('advices', [AdviceController::class, 'index'])->name('admin.advice.index');
        Route::get('advices/create', [AdviceController::class, 'create'])->name('admin.advice.create');
        Route::post('advices', [AdviceController::class, 'store'])->name('admin.advice.store');
        Route::get('advices/{advice}/edit', [AdviceController::class, 'edit'])->name('admin.advice.edit');
        Route::put('advices/{advice}', [AdviceController::class, 'update'])->name('admin.advice.update');
        Route::delete('advices/{advice}', [AdviceController::class, 'destroy'])->name('admin.advice.destroy');


        Route::get('/admin/formations', [FormationController::class, 'index'])->name('admin.form.index');
        Route::get('/admin/formations/create', [FormationController::class, 'create'])->name('admin.form.create');
        Route::post('/admin/formations', [FormationController::class, 'store'])->name('admin.form.store');
        Route::get('/admin/formations/{formation}/edit', [FormationController::class, 'edit'])->name('edit');
        Route::put('/admin/formations/{formation}', [FormationController::class, 'update'])->name('update');
        Route::delete('/admin/formations/{formation}', [FormationController::class, 'destroy'])->name('destroy');





        Route::resource('formations', FormationController::class);

        Route::get('/admin/formations/create', [FormationController::class, 'create'])->name('admin.form.create');

        Route::get('/admin/formations', [FormationController::class, 'index'])->name('admin.form.index');
        Route::get('/admin/formations/create', [FormationController::class, 'create'])->name('admin.form.create');


        Route::get('/admin/formations/{formation}/edit', [FormationController::class, 'edit'])->name('edit');
        Route::delete('/admin/formations/{formation}', [FormationController::class, 'destroy'])->name('destroy');
        Route::get('/admin/formations', [FormationController::class, 'index'])->name('admin.form.index');
        Route::post('/admin/formations', [FormationController::class, 'store'])->name('admin.form.store');
        Route::put('/admin/formations/{formation}', [FormationController::class, 'update'])->name('update');




        Route::get('/admin/form', [FormationController::class, 'create'])->name('admin.form.index');

        Route::post('/form', [FormationController::class, 'store'])->name('formations.store');

        Route::get('/create', [FormationController::class, 'create'])->name('create');

        Route::post('/', [FormationController::class, 'store'])->name('store');

        Route::get('/{formation}/edit', [FormationController::class, 'edit'])->name('edit');

        // Route::put('/{formation}', [FormationController::class, 'update'])->name('update');


        // Route::delete('/{formation}', [FormationController::class, 'destroy'])->name('destroy');
    });

    Route::post('/{formation}/register', [FormationController::class, 'register'])->name('registerFormation');
    Route::get('/{formation}/show', [FormationController::class, 'show'])->name('showFormation');
});

Route::get('/forgottenPassword', [AnotherController::class, 'forg_password'])->name('forgottenPassword');
Route::get('/otpcode', [AnotherController::class, 'otp_code_fun'])->name('otpcode');
Route::get('/newPassword', [AnotherController::class, 'new_password_fun'])->name('newPassword');

Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration.process');
Route::post('/forgottenPassword', [AuthController::class, 'forgottenPassword'])->name('forgottenPassword.process');
Route::post('/otpcode', [AuthController::class, 'checkOtpCode'])->name('otpCode.process');
Route::post('/newPassword', [AuthController::class, 'newPassword'])->name('newPassword.process');
