<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cycle;
use App\Models\Filiere;
use App\Models\Specialite;
use App\Models\Pays;
use App\Models\Region;
use App\Models\Departement;
use App\Models\Arrondissement;
use App\Models\Concours;
// Ajouter les modèles dont tu as besoin
use App\Models\Slider;
use App\Models\Annonce;
use App\Models\Personnel;
use App\Models\Actualite;
use Barryvdh\DomPDF\Facade\Pdf;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;


//use PDF; // DomPDF

class ConcoursController extends Controller
{
  public function fichePDF($id)
{
    $candidat = Concours::with([
        'cycle',
        'filiere',
        'specialite',
        'pays',
        'region',
        'departement',
        'arrondissement'
    ])->findOrFail($id);

    /*
    |--------------------------------------------------------------------------
    | QR CODE
    |--------------------------------------------------------------------------
    */
    $dns2d = new DNS2D();
    $dns2d->setStorPath(storage_path('framework/barcodes'));

    $qrCode = $dns2d->getBarcodePNG(
        "ISABEE|{$candidat->numero_candidat}|{$candidat->nom_complet}|{$candidat->centre_examen}",
        'QRCODE'
    );

    /*
    |--------------------------------------------------------------------------
    | CODE BARRE
    |--------------------------------------------------------------------------
    */
    $dns1d = new DNS1D();
    $dns1d->setStorPath(storage_path('framework/barcodes'));

    $barcode = $dns1d->getBarcodePNG(
        $candidat->numero_candidat,
        'C128'
    );

    /*
    |--------------------------------------------------------------------------
    | DATE DE GENERATION
    |--------------------------------------------------------------------------
    */
     // Date de génération
    $generated_at = now()->format('d/m/Y H:i:s');


    $pdf = Pdf::loadView(
        'pdf.fiche_inscription',
        compact(
            'candidat',
            'qrCode',
            'barcode',
            'generated_at'
        )
    )->setPaper('a4', 'portrait');

    return $pdf->stream(
        'fiche_'.$candidat->numero_candidat.'.pdf'
    );
}
    // Page formulaire complet
 public function formulaire(Request $request)
{
    $cycles = Cycle::orderBy('nom_cycle')->get();
    $filieres = Filiere::orderBy('nom_filiere')->get();
    $specialites = Specialite::orderBy('nom_specialite')->get();

    $pays = Pays::orderBy('nom_pays')->get();
    $regions = Region::orderBy('nom_region')->get();
    $departements = Departement::orderBy('nom_departement')->get();
    $arrondissements = Arrondissement::orderBy('nom_arrondissement')->get();

    $centresExamen = [
        'Bertoua' => 'Bertoua',
        'Douala' => 'Douala',
        'Dschang' => 'Dschang',
        'Ebolowa' => 'Ebolowa',
        'Garoua' => 'Garoua',
        'Meyomessala' => 'Meyomessala',
        'Yaounde' => 'Yaoundé',
    ];

    $numeroRecu = $request->query('numero_recu');
    $mode = $request->query('mode', 'create');

    $candidat = null;

    if ($mode === 'edit' && $numeroRecu) {
        $candidat = Concours::where('numero_recu', $numeroRecu)->firstOrFail();
    }

    return view('concours.inscription_formulaire', compact(
        'cycles',
        'filieres',
        'specialites',
        'pays',
        'regions',
        'departements',
        'arrondissements',
        'centresExamen',
        'numeroRecu',
        'mode',
        'candidat'
    ));
}
    // Stockage des données
 public function store(Request $request)
{
    /*
    |--------------------------------------------------------------------------
    | Validation principale
    |--------------------------------------------------------------------------
    */

    $validated = $request->validate([
        'numero_recu' => 'required|string|max:255|unique:concours,numero_recu',

        'cycle_id' => 'required|exists:cycles,id',
        'filiere_id' => 'required|exists:filieres,id',
        'specialite_id' => 'required|exists:specialites,id',

        'pays_id' => 'required|exists:pays,id',
        'region_id' => 'nullable|exists:regions,id',
        'departement_id' => 'nullable|exists:departements,id',
        'arrondissement_id' => 'nullable|exists:arrondissements,id',

        'centre_examen' => 'required|string|in:Bertoua,Douala,Dschang,Ebolowa,Garoua,Meyomessala,Yaounde',
        'langue_composition' => 'required|in:Français,Anglais',

        'nom_complet' => 'required|string|max:255',
        'date_naissance' => 'required|date',
        'lieu_naissance' => 'required|string|max:255',

        'numero_nci' => 'nullable|string|max:255',
        'sexe' => 'required|in:Masculin,Féminin',

        // téléphone supprimé
        'numero_telephone_candidat' => 'required|digits:9',

        'email' => 'nullable|email|max:255',
        'nationalite' => 'nullable|string|max:255',
        'marital' => 'nullable|string|max:255',
        'profession' => 'required|in:ETUDIANT,FONCTIONNAIRE,AUTRE',

        'nom_pere' => 'nullable|string|max:255',
        'numero_telephone_pere' => 'nullable|digits:9',
        'profession_pere' => 'nullable|string|max:255',

        'nom_mere' => 'nullable|string|max:255',
        'profession_mere' => 'nullable|string|max:255',
        'numero_telephone_mere' => 'nullable|digits:9',
        'ville_parents' => 'nullable|string|max:255',

        'Personne_a_contacter_cas_urgent' => 'nullable|string|max:255',
        'numero_telephone_Personne_a_contacte_urgent' => 'nullable|digits:9',
        'ville_Personne_a_contacte_cas_urgent' => 'nullable|string|max:255',

        'diplome_entre' => 'nullable|string|max:255',
        'serie_diplome' => 'nullable|string|max:255',
        'annee_obtention_diplome' => 'nullable|string|max:255',
        'emetteur_entre_diplome' => 'nullable|string|max:255',
        'moyenne_obtenu_diplome' => 'nullable|string|max:255',
        'numero_diplome_entre' => 'nullable|string|max:255',

        'sport_pratique' => 'nullable|string|max:255',
        'handicape' => 'nullable|string|max:255',

        'photo_etudiant' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'document_scanner' => 'nullable|mimes:pdf,jpg,jpeg,png|max:4096',
    ], [
        'numero_recu.required' => 'Le numéro de transaction est obligatoire.',
        'numero_recu.unique' => 'Ce numéro de transaction est déjà utilisé.',

        'cycle_id.required' => 'Le cycle est obligatoire.',
        'filiere_id.required' => 'La filière est obligatoire.',
        'specialite_id.required' => 'La spécialité est obligatoire.',

        'pays_id.required' => 'Le pays est obligatoire.',
        'region_id.required' => 'La région est obligatoire pour le Cameroun.',
        'departement_id.required' => 'Le département est obligatoire pour le Cameroun.',
        'arrondissement_id.required' => 'L’arrondissement est obligatoire pour le Cameroun.',

        'centre_examen.in' => 'Le centre d’examen choisi est invalide.',
        'langue_composition.required' => 'La langue de composition est obligatoire.',
        'langue_composition.in' => 'La langue de composition doit être Français ou Anglais.',

        'numero_telephone_candidat.required' => 'Le numéro de téléphone du candidat est obligatoire.',
        'numero_telephone_candidat.digits' => 'Le numéro de téléphone du candidat doit contenir exactement 9 chiffres.',

        'email.email' => 'L’adresse e-mail doit avoir un format valide.',

        'numero_telephone_pere.digits' => 'Le numéro de téléphone du père doit contenir exactement 9 chiffres.',
        'numero_telephone_mere.digits' => 'Le numéro de téléphone de la mère doit contenir exactement 9 chiffres.',
        'numero_telephone_Personne_a_contacte_urgent.digits' => 'Le numéro de la personne à contacter doit contenir exactement 9 chiffres.',
    ]);

    /*
    |--------------------------------------------------------------------------
    | Vérification localisation Cameroun / étranger
    |--------------------------------------------------------------------------
    */

    $pays = Pays::findOrFail($validated['pays_id']);

    $isCameroon = in_array($pays->nom_pays, ['Cameroon', 'Cameroun'], true);

    if ($isCameroon) {
        $request->validate([
            'region_id' => 'required|exists:regions,id',
            'departement_id' => 'required|exists:departements,id',
            'arrondissement_id' => 'required|exists:arrondissements,id',
        ], [
            'region_id.required' => 'La région est obligatoire pour le Cameroun.',
            'departement_id.required' => 'Le département est obligatoire pour le Cameroun.',
            'arrondissement_id.required' => 'L’arrondissement est obligatoire pour le Cameroun.',
        ]);
    } else {
        $validated['region_id'] = null;
        $validated['departement_id'] = null;
        $validated['arrondissement_id'] = null;
    }

    /*
    |--------------------------------------------------------------------------
    | Vérification cohérence cycle → filière → spécialité
    |--------------------------------------------------------------------------
    */

    $filiereValide = Filiere::where('id', $validated['filiere_id'])
        ->where('cycle_id', $validated['cycle_id'])
        ->exists();

    if (!$filiereValide) {
        return back()
            ->withErrors(['filiere_id' => 'La filière choisie ne correspond pas au cycle sélectionné.'])
            ->withInput();
    }

    $specialiteValide = Specialite::where('id', $validated['specialite_id'])
        ->where('filiere_id', $validated['filiere_id'])
        ->exists();

    if (!$specialiteValide) {
        return back()
            ->withErrors(['specialite_id' => 'La spécialité choisie ne correspond pas à la filière sélectionnée.'])
            ->withInput();
    }

    /*
    |--------------------------------------------------------------------------
    | Upload photo étudiant
    |--------------------------------------------------------------------------
    */

    if ($request->hasFile('photo_etudiant')) {
        $photo = $request->file('photo_etudiant');
        $photoName = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();

        $photo->move(public_path('uploads/photos_etudiants'), $photoName);

        $validated['photo_etudiant'] = $photoName;
    }

    /*
    |--------------------------------------------------------------------------
    | Upload document scanné
    |--------------------------------------------------------------------------
    */

    if ($request->hasFile('document_scanner')) {
        $doc = $request->file('document_scanner');
        $docName = time() . '_' . uniqid() . '.' . $doc->getClientOriginalExtension();

        $doc->move(public_path('uploads/documents_scanner'), $docName);

        $validated['document_scanner'] = $docName;
    }

    /*
    /*
|--------------------------------------------------------------------------
| Génération du numéro candidat
|--------------------------------------------------------------------------
| Le préfixe dépend du centre d’examen.
| Le numéro est continu globalement, quel que soit le centre choisi.
|
| Exemple :
| BE0001
| DO0002
| YA0003
| EB0004
|--------------------------------------------------------------------------
*/

$prefixes = [
    'Bertoua' => 'BE',
    'Douala' => 'DO',
    'Dschang' => 'DS',
    'Ebolowa' => 'EB',
    'Garoua' => 'GA',
    'Meyomessala' => 'ME',
    'Yaounde' => 'YA',
];

$centre = $validated['centre_examen'];
$prefix = $prefixes[$centre];

$lastCandidat = Concours::whereNotNull('numero_candidat')
    ->orderBy('id', 'desc')
    ->first();

if ($lastCandidat && $lastCandidat->numero_candidat) {
    // On enlève les 2 lettres du centre : BE0001 devient 0001
    $lastNumber = (int) substr($lastCandidat->numero_candidat, 2);
    $nextNumber = $lastNumber + 1;
} else {
    $nextNumber = 1;
}

do {
    $numeroCandidat = $prefix . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

    $exists = Concours::where('numero_candidat', $numeroCandidat)->exists();

    if ($exists) {
        $nextNumber++;
    }
} while ($exists);

$validated['numero_candidat'] = $numeroCandidat;
    /*
    |--------------------------------------------------------------------------
    | Création inscription
    |--------------------------------------------------------------------------
    */

    $concours = Concours::create($validated);

    return redirect()
        ->back()
        ->with('success', 'Inscription réussie ! Votre numéro de candidat est : ' . $concours->numero_candidat)
        ->with('candidat_id', $concours->id);
}
 
public function inscription()
{
    // Récupérer les données nécessaires pour la page
    $cycles = Cycle::all();       // si tu as un modèle Cycle
    $filieres = Filiere::all();   // si tu as un modèle Filiere
    $sliders = Slider::all();     // images du slider
    $annonces = Annonce::all();   // annonces importantes
    $personnels = Personnel::all(); // staff
    $actualites = Actualite::latest()->take(5)->get(); // dernières actualités

    // Retourner la vue inscription
    return view('concours.inscription', compact(
        'cycles',
        'filieres',
        'sliders',
        'annonces',
        'personnels',
        'actualites'
    ));
}
public function filieres($cycle_id)
{
    $filieres = Filiere::where('cycle_id', $cycle_id)
        ->orderBy('nom_filiere')
        ->get(['id', 'nom_filiere']);

    return response()->json($filieres);
}

public function specialites($filiere_id)
{
    $specialites = Specialite::where('filiere_id', $filiere_id)
        ->orderBy('nom_specialite')
        ->get(['id', 'nom_specialite']);

    return response()->json($specialites);
}

public function regions($pays_id)
{
    $regions = Region::where('pays_id', $pays_id)
        ->orderBy('nom_region')
        ->get(['id', 'nom_region']);

    return response()->json($regions);
}

public function departements($region_id)
{
    $departements = Departement::where('region_id', $region_id)
        ->orderBy('nom_departement')
        ->get(['id', 'nom_departement']);

    return response()->json($departements);
}

public function arrondissements($departement_id)
{
    $arrondissements = Arrondissement::where('departement_id', $departement_id)
        ->orderBy('nom_arrondissement')
        ->get(['id', 'nom_arrondissement']);

    return response()->json($arrondissements);
}

public function commencer(Request $request)
{
    $validated = $request->validate([
        'numero_recu' => 'required|string|max:255|confirmed',
    ], [
        'numero_recu.required' => 'Le numéro de transaction est obligatoire.',
        'numero_recu.confirmed' => 'Les deux numéros de transaction ne correspondent pas.',
    ]);

    $numeroRecu = trim($validated['numero_recu']);

    $existe = Concours::where('numero_recu', $numeroRecu)->first();

    if ($existe) {
        return redirect()
            ->route('concours.inscription')
            ->with('error', 'Ce numéro de transaction est déjà utilisé. Veuillez plutôt modifier ou vérifier votre inscription.');
    }

    return redirect()
        ->route('concours.formulaire', [
            'numero_recu' => $numeroRecu,
            'mode' => 'create'
        ]);
}

public function modifier(Request $request)
{
    $validated = $request->validate([
        'numero_recu' => 'required|string|max:255|confirmed',
    ], [
        'numero_recu.required' => 'Le numéro de transaction est obligatoire.',
        'numero_recu.confirmed' => 'Les deux numéros de transaction ne correspondent pas.',
    ]);

    $numeroRecu = trim($validated['numero_recu']);

    $candidat = Concours::where('numero_recu', $numeroRecu)->first();

    if (!$candidat) {
        return redirect()
            ->route('concours.inscription')
            ->with('error', 'Aucune inscription trouvée avec ce numéro de transaction.');
    }

    return redirect()
        ->route('concours.formulaire', [
            'numero_recu' => $numeroRecu,
            'mode' => 'edit'
        ]);
}



public function verifier(Request $request)
{
    $validated = $request->validate([
        'numero_recu' => 'required|string|max:255|confirmed',
    ], [
        'numero_recu.required' => 'Le numéro de transaction est obligatoire.',
        'numero_recu.confirmed' => 'Les deux numéros de transaction ne correspondent pas.',
    ]);

    $numeroRecu = trim($validated['numero_recu']);

    $candidat = Concours::where('numero_recu', $numeroRecu)->first();

    if (!$candidat) {
        return redirect()
            ->route('concours.inscription')
            ->with('error', 'Aucune inscription trouvée avec ce numéro de transaction.');
    }

    return redirect()->route('concours.fiche', $candidat->id);
}

public function update(Request $request, $id)
{
    $candidat = Concours::findOrFail($id);

    $validated = $request->validate([
        'numero_recu' => 'required|string|max:255|unique:concours,numero_recu,' . $candidat->id,

        'cycle_id' => 'required|exists:cycles,id',
        'filiere_id' => 'required|exists:filieres,id',
        'specialite_id' => 'required|exists:specialites,id',

        'pays_id' => 'required|exists:pays,id',
        'region_id' => 'required|exists:regions,id',
        'departement_id' => 'required|exists:departements,id',
        'arrondissement_id' => 'required|exists:arrondissements,id',

        'centre_examen' => 'required|string|max:255',
        'nom_complet' => 'required|string|max:255',
        'date_naissance' => 'required|date',
        'lieu_naissance' => 'required|string|max:255',

        'numero_nci' => 'nullable|string|max:255',
        'sexe' => 'nullable|string|max:255',
        'telephone' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'nationalite' => 'nullable|string|max:255',
        'marital' => 'nullable|string|max:255',
        'profession' => 'nullable|string|max:255',
        'numero_telephone_candidat' => 'nullable|string|max:255',
        'langue_composition' => 'nullable|string|max:255',

        'nom_pere' => 'nullable|string|max:255',
        'numero_telephone_pere' => 'nullable|string|max:255',
        'profession_pere' => 'nullable|string|max:255',

        'nom_mere' => 'nullable|string|max:255',
        'profession_mere' => 'nullable|string|max:255',
        'numero_telephone_mere' => 'nullable|string|max:255',
        'ville_parents' => 'nullable|string|max:255',

        'Personne_a_contacter_cas_urgent' => 'nullable|string|max:255',
        'numero_telephone_Personne_a_contacte_urgent' => 'nullable|string|max:255',
        'ville_Personne_a_contacte_cas_urgent' => 'nullable|string|max:255',

        'diplome_entre' => 'nullable|string|max:255',
        'serie_diplome' => 'nullable|string|max:255',
        'annee_obtention_diplome' => 'nullable|string|max:255',
        'emetteur_entre_diplome' => 'nullable|string|max:255',
        'moyenne_obtenu_diplome' => 'nullable|string|max:255',
        'numero_diplome_entre' => 'nullable|string|max:255',

        'sport_pratique' => 'nullable|string|max:255',
        'handicape' => 'nullable|string|max:255',

        'photo_etudiant' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'document_scanner' => 'nullable|mimes:pdf,jpg,jpeg,png|max:4096',
    ]);

    if ($request->hasFile('photo_etudiant')) {
        $photo = $request->file('photo_etudiant');
        $photoName = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('uploads/photos_etudiants'), $photoName);
        $validated['photo_etudiant'] = $photoName;
    } else {
        unset($validated['photo_etudiant']);
    }

    if ($request->hasFile('document_scanner')) {
        $doc = $request->file('document_scanner');
        $docName = time() . '_' . uniqid() . '.' . $doc->getClientOriginalExtension();
        $doc->move(public_path('uploads/documents_scanner'), $docName);
        $validated['document_scanner'] = $docName;
    } else {
        unset($validated['document_scanner']);
    }

    $candidat->update($validated);

    return redirect()
        ->route('concours.fiche', $candidat->id)
        ->with('success', 'Inscription modifiée avec succès.');
}

public function getRegions($paysId)
{
    $pays = Pays::findOrFail($paysId);

    if (!in_array($pays->nom_pays, ['Cameroon', 'Cameroun'])) {
        return response()->json([]);
    }

    return response()->json(
        Region::where('pays_id', $paysId)
            ->orderBy('nom_region')
            ->get(['id', 'nom_region'])
    );
}

public function getDepartements($regionId)
{
    return response()->json(
        Departement::where('region_id', $regionId)
            ->orderBy('nom_departement')
            ->get(['id', 'nom_departement'])
    );
}

public function getArrondissements($departementId)
{
    return response()->json(
        Arrondissement::where('departement_id', $departementId)
            ->orderBy('nom_arrondissement')
            ->get(['id', 'nom_arrondissement'])
    );
}

}