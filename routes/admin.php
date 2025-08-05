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
    Route::middleware('prevent.back')->group(function () {
        Route::get('/auth/login/form', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/auth/login/form', [AdminAuthController::class, 'login'])->name('login.submit');
    });

    Route::middleware(['admin', 'prevent.back'])->group(function () {
        // Rutas de cierre de sesión
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        //Ruta para la gestion del perfil del administrador
        Route::get('/profile', [AdminUserController::class, 'profile'])->name('profile');
        Route::post('/profile/avatar', [AdminUserController::class, 'updateavatar'])->name('profile.avatar');
        // Ruta para actualizar la contraseña del administrador
        Route::post('/profile/password', [AdminUserController::class, 'updatePassword'])->name('profile.password');
        // Ruta para actualizar los datos del perfil del administrador
        Route::post('/profile/update', [AdminUserController::class, 'profileupdat1e'])->name('profile.update');
        //Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    });
});
