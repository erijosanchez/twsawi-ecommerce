<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AdminUserController,
    AdminAuthController,
};

// =================================
// Rutas de autenticación de administrador
// =================================
Route::prefix('admin')->name('admin.')->group(function () {
    // Rutas de inicio de sesión
    Route::middleware('guest')->group(function () {
        Route::get('/auth/login/form', [AdminAuthController::class, 'showLoginForm'])->name('login');
    });
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    //Dashboard
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
});
