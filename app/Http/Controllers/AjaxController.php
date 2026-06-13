<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;
use App\Models\Specialite;
use App\Models\Departement;
use App\Models\Arrondissement;

class AjaxController extends Controller
{
    public function filieres($cycle_id){
        return Filiere::where('cycle_id', $cycle_id)->get();
    }

    public function specialites($filiere_id){
        return Specialite::where('filiere_id', $filiere_id)->get();
    }

    public function departements($region_id){
        return Departement::where('region_id', $region_id)->get();
    }

    public function arrondissements($departement_id){
        return Arrondissement::where('departement_id', $departement_id)->get();
    }
}