<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Aquí puedes agregar la lógica para el dashboard del administrador
        return view('admin.layouts.admin');
    }
}
