<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'No autenticado'], 401);
            }
            return redirect()->route('admin.login')->with('error', 'Debes iniciar sesión para acceder.');
        }

        $user = Auth::user();

        // Verificar si el usuario puede acceder al panel de admin
        if (!$user->canAccessAdmin()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            $message = !$user->isAdmin() 
                ? 'No tienes permisos para acceder al panel de administración.' 
                : 'Tu cuenta está desactivada. Contacta al administrador.';

            if ($request->expectsJson()) {
                return response()->json(['message' => $message], 403);
            }

            return redirect()->route('admin.login')->with('error', $message);
        }

        return $next($request);
    }
}
