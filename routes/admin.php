<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AdminUserController,
    AdminAuthController,
    AdminDashboardController,
};

// =================================
// Rutas de autenticación de administrador
// =================================
Route::prefix('admin')->name('admin.')->group(function () {
    // Rutas de inicio de sesión
    Route::middleware('guest')->group(function () {
        Route::get('/auth/login/form', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/auth/login/form', [AdminAuthController::class, 'login'])->name('login.submit');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        // Rutas de cierre de sesión
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        //Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    });
});
