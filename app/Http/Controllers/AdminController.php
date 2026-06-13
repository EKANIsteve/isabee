<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Vérification du rôle directement
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Accès interdit');
        }

        return view('admin.dashboard');
    }
}
