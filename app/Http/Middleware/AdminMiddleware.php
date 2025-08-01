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
            return redirect()->route('admin.login');
        }

        $user = Auth::user();

        // Verificar si el usuario puede acceder al admin
        if (!$user->canAccessAdmin()) {
            Auth::logout();
            
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'No tienes permisos para acceder al panel de administración'
                ], 403);
            }
            
            return redirect()->route('admin.login')
                ->withErrors(['email' => 'No tienes permisos para acceder al panel de administración.']);
        }

        return $next($request);
    }
}
