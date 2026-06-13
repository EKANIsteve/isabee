<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Slider;
use App\Models\Actualite;
use App\Models\Personnel;

class HomeController extends Controller
{
    public function index()
    {
        $annonces = Annonce::latest()->get();
        $sliders = Slider::latest()->get();
        $actualites = Actualite::latest()->take(3)->get();
        $personnels = Personnel::latest()->get();

        return view('pages.home', compact(
            'annonces',
            'sliders',
            'actualites',
            'personnels'
        ));
    }
}