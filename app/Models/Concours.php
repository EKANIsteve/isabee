<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        'type_handicap',
        'photo_etudiant',
        'document_scanner',
        'candidate_edit_count',
        'candidate_edited_at',
        'admin_edited_by',
        'admin_edited_at',
    ];

    protected $casts = [
        'date_naissance' => 'date',
        'candidate_edited_at' => 'datetime',
        'admin_edited_at' => 'datetime',
    ];

    public function getPhotoUrlAttribute(): string
    {
        if (!$this->photo_etudiant) {
            return asset('images/default-user.png');
        }

        if (str_starts_with($this->photo_etudiant, 'http://') || str_starts_with($this->photo_etudiant, 'https://')) {
            return $this->photo_etudiant;
        }

        if (str_starts_with($this->photo_etudiant, 'storage/')) {
            return asset($this->photo_etudiant);
        }

        return Storage::disk('public')->url($this->photo_etudiant);
    }

    public function getDocumentUrlAttribute(): ?string
    {
        if (!$this->document_scanner) {
            return null;
        }

        if (str_starts_with($this->document_scanner, 'http://') || str_starts_with($this->document_scanner, 'https://')) {
            return $this->document_scanner;
        }

        if (str_starts_with($this->document_scanner, 'storage/')) {
            return asset($this->document_scanner);
        }

        return Storage::disk('public')->url($this->document_scanner);
    }

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

    public function adminEditeur()
    {
        return $this->belongsTo(User::class, 'admin_edited_by');
    }
}