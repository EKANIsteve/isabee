<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        // Vérification du rôle directement
        if (auth()->user()->role !== 'etudiant') {
            abort(403, 'Accès interdit');
        }

        return view('etudiant.dashboard');
    }
}
