<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\AdminActivityLog;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    /**
     * Show the admin login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        if (Auth::check() && Auth::user()->canAccessAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    /**
     * Handle the admin login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate the request data
        $validaror = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico es inválido.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
        ]);

        if ($validaror->fails()) {
            return back()
                ->withErrors($validaror)
                ->withInput($request->only('email'));
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        // Intentar autenticar al administrador
        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            // Verificar si el usuario es admin y está activo
            if (!$user->canAccessAdmin()) {
                Auth::logout();

                $errorMessage = !$user->isAdmin()
                    ? 'No tienes permisos para acceder al panel de administración.'
                    : 'Tu cuenta está desactivada. Contacta al administrador.';

                return back()->withErrors([
                    'email' => $errorMessage,
                ])->withInput($request->only('email'));
            }

            // Regenerar sesión por seguridad
            $request->session()->regenerate();

            // Actualizar último login
            $user->updateLastLogin($request->ip());

            // Registrar el login del admin
            $this->logActivity('admin_login', $user, [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Bienvenido al panel de administración');
        }

        // login fallido registrar intento
        $this->logFailedLogin($request);
        return back()->withErrors([
            'email' => 'Credenciales incorrectas. Por favor, inténtalo de nuevo.',
        ])->withInput($request->only('email'));
    }
}
