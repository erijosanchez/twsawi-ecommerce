<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Aquí puedes agregar la lógica para el dashboard del administrador
        auth()->user()->last_login_at = now();
        auth()->user()->save();

        $user = auth()->user();
        // Retorna la vista del dashboard
        return view('admin.pages.dashboard.index', compact('user')); // Asegúrate de tener una vista llamada 'admin.dashboard.index'
    }
}
