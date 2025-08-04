<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\AdminActivityLog;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\RateLimiter;


class AdminAuthController extends Controller
{
    /**
     * Show the admin login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        Session::forget('navigation_attempts');

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
        // Rate limiting - máximo 5 intentos por minuto por IP
        $key = 'login.' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->withErrors([
                'email' => "Demasiados intentos de login. Inténtalo de nuevo en {$seconds} segundos.",
            ])->withInput($request->only('email'));
        }

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico es inválido.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
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
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                $errorMessage = !$user->isAdmin()
                    ? 'No tienes permisos para acceder al panel de administración.'
                    : 'Tu cuenta está desactivada. Contacta al administrador.';

                // Registrar intento de acceso no autorizado
                $this->logActivity('unauthorized_admin_access_attempt', $user, [
                    'ip' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'reason' => !$user->isAdmin() ? 'not_admin' : 'inactive_account'
                ]);

                RateLimiter::hit($key);

                return back()->withErrors([
                    'email' => $errorMessage,
                ])->withInput($request->only('email'));
            }

            // Regenerar sesión por seguridad
            $request->session()->regenerate();

            // Limpiar rate limiting en login exitoso
            RateLimiter::clear($key);

            // Actualizar último login
            $user->updateLastLogin($request->ip());

            // Registrar el login del admin
            $this->logActivity('admin_login', $user, [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Bienvenido al panel de administración, ' . $user->name);
        }

        // Login fallido - incrementar rate limiting
        RateLimiter::hit($key);

        // Registrar intento fallido si existe el usuario
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $this->logActivity('failed_admin_login_attempt', $user, [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas. Por favor, inténtalo de nuevo.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        // Registrar logout
        if ($user && $user->isAdmin()) {
            $this->logActivity('admin_logout', $user, [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::forget('navigation_attempts');


        return redirect()->route('admin.login')
            ->with('success', 'Has cerrado sesión correctamente.');
    }

    /**
     * Log admin activity
     *
     * @param string $action
     * @param User $user
     * @param array $details
     * @return void
     */
    private function logActivity($action, $user, $details = [])
    {
        try {
            AdminActivityLog::create([
                'user_id' => $user->id,
                'action' => $action,
                'description' => $this->getActionDescription($action, $user),
                'ip_address' => $details['ip'] ?? null,
                'user_agent' => $details['user_agent'] ?? null,
                'details' => json_encode($details),
                'created_at' => now(),
            ]);
        } catch (\Exception $e) {
            // Log the error but don't break the flow
            \Log::error('Failed to log admin activity: ' . $e->getMessage());
        }
    }

    /**
     * Get action description for logging
     *
     * @param string $action
     * @param User $user
     * @return string
     */
    private function getActionDescription($action, $user)
    {
        $descriptions = [
            'admin_login' => "Usuario {$user->name} ({$user->email}) inició sesión en el panel de administración",
            'admin_logout' => "Usuario {$user->name} ({$user->email}) cerró sesión en el panel de administración",
            'failed_admin_login_attempt' => "Intento fallido de login para {$user->email}",
            'unauthorized_admin_access_attempt' => "Intento de acceso no autorizado por {$user->email}",
        ];

        return $descriptions[$action] ?? "Acción desconocida: {$action}";
    }
}
