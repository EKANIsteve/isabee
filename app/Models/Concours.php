<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concours extends Model
{
    protected $table = 'concours';

    protected $fillable = [
        'cycle_id',
        'filiere_id',
        'specialite_id',
        'pays_id',
        'region_id',
        'departement_id',
        'arrondissement_id',
        'centre_examen',
        'numero_recu',
        'numero_candidat',
        'nom_complet',
        'date_naissance',
        'lieu_naissance',
        'numero_nci',
        'sexe',
        'telephone',
        'email',
        'nationalite',
        'marital',
        'profession',
        'numero_telephone_candidat',
        'langue_composition',
        'nom_pere',
        'numero_telephone_pere',
        'profession_pere',
        'nom_mere',
        'profession_mere',
        'numero_telephone_mere',
        'ville_parents',
        'Personne_a_contacter_cas_urgent',
        'numero_telephone_Personne_a_contacte_urgent',
        'ville_Personne_a_contacte_cas_urgent',
        'diplome_entre',
        'serie_diplome',
        'annee_obtention_diplome',
        'emetteur_entre_diplome',
        'moyenne_obtenu_diplome',
        'numero_diplome_entre',
        'sport_pratique',
        'handicape',
        'photo_etudiant',
        'document_scanner',
    ];

    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public function specialite()
    {
        return $this->belongsTo(Specialite::class);
    }

    public function pays()
    {
        return $this->belongsTo(Pays::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function arrondissement()
    {
        return $this->belongsTo(Arrondissement::class);
    }
}