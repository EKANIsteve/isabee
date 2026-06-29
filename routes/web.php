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

    Route::get('/', [ConcoursController::class, 'inscription'])
        ->name('index');

    Route::get('/inscription', function () {
        return redirect()->route('concours.index');
    })->name('inscription');

    Route::get('/admission', [ConcoursController::class, 'admission'])
        ->name('admission');

    Route::get('/communique', [ConcoursController::class, 'communique'])
        ->name('communique');

    Route::get('/liste-provisoire', [ConcoursController::class, 'listeProvisoire'])
        ->name('listeProvisoire');

    Route::get('/resultat', [ConcoursController::class, 'resultat'])
        ->name('resultat');

    Route::post('/commencer', [ConcoursController::class, 'commencer'])
        ->name('commencer');

    Route::post('/modifier', [ConcoursController::class, 'modifier'])
        ->name('modifier');

    Route::post('/verifier', [ConcoursController::class, 'verifier'])
        ->name('verifier');

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
| Localisation
|--------------------------------------------------------------------------
*/

Route::get('/localisation/regions/{pays}', [ConcoursController::class, 'getRegions'])
    ->name('localisation.regions');

Route::get('/localisation/departements/{region}', [ConcoursController::class, 'getDepartements'])
    ->name('localisation.departements');

Route::get('/localisation/arrondissements/{departement}', [ConcoursController::class, 'getArrondissements'])
    ->name('localisation.arrondissements');

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
| Administration
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

/*
|--------------------------------------------------------------------------
| Profil utilisateur
|--------------------------------------------------------------------------
*/



Route::middleware(['auth', 'role:super_admin,admin,scolarite,viewer'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/concours/{concours}', [AdminConcoursController::class, 'show'])
            ->name('concours.show');
    });

Route::middleware(['auth', 'role:super_admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/concours/{concours}/edit', [AdminConcoursController::class, 'edit'])
            ->name('concours.edit');

        Route::put('/concours/{concours}', [AdminConcoursController::class, 'update'])
            ->name('concours.update');
    });
/*
|--------------------------------------------------------------------------
| Auth Breeze
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';