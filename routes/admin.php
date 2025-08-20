<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AdminUserController,
    AdminAuthController,
    AdminDashboardController,
    CategoriesController,
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
        Route::post('/profile/update', [AdminUserController::class, 'updateProfileData'])->name('profile.update');
        //Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Rutas de gestión de usuarios
        Route::get('users', [AdminUserController::class, 'viewUsers'])->name('users.view');
        Route::get('/users/{user}/edit', [AdminUserController::class, 'editUser'])->name('users.edit');
        Route::post('/users/{user}', [AdminUserController::class, 'updateUser'])->name('users.update');
        // Ruta para actualizar la contraseña de los usuarios
        Route::post('/users/password/{edit}', [AdminUserController::class, 'updatePasswordUser'])->name('users.password');
        // Ruta para actualizar el avatar de los usuarios
        Route::post('/users/avatar/{edit}', [AdminUserController::class, 'updateAvatarUser'])->name('users.avatar');
        Route::delete('/users/{user}', [AdminUserController::class, 'destroyUser'])->name('users.destroy');
        // Ruta para crear un nuevo usuario
        Route::get('/users/create', [AdminUserController::class, 'createUser'])->name('users.create');
        Route::post('/users/store/create', [AdminUserController::class, 'storeUser'])->name('users.store');

        //Ruta para la gestion de roles y permisos
        

        // Ruta para la gestion de Categorias
        Route::resource('categories', CategoriesController::class);
        


        
    });
});
