<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConcoursController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\Admin\DashboardController;


/*
|--------------------------------------------------------------------------
| Page d'accueil
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


/*
|--------------------------------------------------------------------------
| Concours ISABEE
|--------------------------------------------------------------------------
*/

Route::prefix('concours')->name('concours.')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Pages publiques du concours
    |--------------------------------------------------------------------------
    */

    Route::get('/inscription', [ConcoursController::class, 'inscription'])
        ->name('inscription');

    Route::get('/admission', [ConcoursController::class, 'admission'])
        ->name('admission');

    Route::get('/communique', [ConcoursController::class, 'communique'])
        ->name('communique');

    Route::get('/liste-provisoire', [ConcoursController::class, 'listeProvisoire'])
        ->name('listeProvisoire');

    Route::get('/resultat', [ConcoursController::class, 'resultat'])
        ->name('resultat');


    /*
    |--------------------------------------------------------------------------
    | Confirmation du numéro de transaction
    |--------------------------------------------------------------------------
    */

    Route::post('/commencer', [ConcoursController::class, 'commencer'])
        ->name('commencer');

    Route::post('/modifier', [ConcoursController::class, 'modifier'])
        ->name('modifier');

    Route::post('/verifier', [ConcoursController::class, 'verifier'])
        ->name('verifier');


    /*
    |--------------------------------------------------------------------------
    | Formulaire d'inscription
    |--------------------------------------------------------------------------
    */

    Route::get('/formulaire', [ConcoursController::class, 'formulaire'])
        ->name('formulaire');

    Route::post('/store', [ConcoursController::class, 'store'])
        ->name('store');

    Route::put('/update/{id}', [ConcoursController::class, 'update'])
        ->name('update');
});


/*
|--------------------------------------------------------------------------
| Fiche PDF concours
|--------------------------------------------------------------------------
*/

Route::get('/fiche/{id}', [ConcoursController::class, 'fichePDF'])
    ->name('concours.fiche');


/*
|--------------------------------------------------------------------------
| AJAX Concours
|--------------------------------------------------------------------------
*/

Route::get('/ajax/filieres/{cycle}', [ConcoursController::class, 'filieres'])
    ->name('ajax.filieres');

Route::get('/ajax/specialites/{filiere}', [ConcoursController::class, 'specialites'])
    ->name('ajax.specialites');

Route::get('/ajax/regions/{pays}', [ConcoursController::class, 'regions'])
    ->name('ajax.regions');

Route::get('/ajax/departements/{region}', [ConcoursController::class, 'departements'])
    ->name('ajax.departements');

Route::get('/ajax/arrondissements/{departement}', [ConcoursController::class, 'arrondissements'])
    ->name('ajax.arrondissements');


/*
|--------------------------------------------------------------------------
| Inscription simple
|--------------------------------------------------------------------------
*/

Route::post('/inscription', [InscriptionController::class, 'store'])
    ->name('inscription.submit');


/*
|--------------------------------------------------------------------------
| Formation continue
|--------------------------------------------------------------------------
*/

Route::get('/formation-continue', [FormationController::class, 'index'])
    ->name('formation.continue');


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::put('/users/{user}/role', [DashboardController::class, 'updateRole'])
        ->name('users.role.update');
});

/*

|--------------------------------------------------------------------------
| Profil utilisateur
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::put('/users/{user}/role', [DashboardController::class, 'updateRole'])
        ->name('users.role.update');
         Route::get('/imprimer-liste-centre-cycle', [DashboardController::class, 'imprimerListeCentreCycle'])
        ->name('imprimer.liste.centre.cycle');

    Route::get('/imprimer-liste-centre-repartie', [DashboardController::class, 'imprimerListeCentreRepartie'])
        ->name('imprimer.liste.centre.repartie');
});

/*
|--------------------------------------------------------------------------
| Redirection après connexion Laravel Breeze
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});
Route::get('/imprimer-liste-centre-repartie', [DashboardController::class, 'imprimerListeCentreRepartie'])
    ->name('imprimer.liste.centre.repartie');
    Route::get('/localisation/regions/{pays}', [ConcoursController::class, 'getRegions']);
Route::get('/localisation/departements/{region}', [ConcoursController::class, 'getDepartements']);
Route::get('/localisation/arrondissements/{departement}', [ConcoursController::class, 'getArrondissements']);


require __DIR__.'/auth.php';