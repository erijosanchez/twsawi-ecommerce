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
        //Dashboard
        Route::get('/dashboard/view', [AdminDashboardController::class, 'index'])->name('dashboard.view');
    });
});
