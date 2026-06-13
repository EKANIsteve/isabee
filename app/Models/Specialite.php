<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    protected $fillable = ['filiere_id', 'nom_specialite'];

    // Une spécialité appartient à une filière
    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    // Une spécialité a plusieurs concours
    public function concours()
    {
        return $this->hasMany(Concours::class);
    }

    // Accès direct au cycle via la filière
    public function cycle()
    {
        return $this->hasOneThrough(Cycle::class, Filiere::class, 'id', 'id', 'filiere_id', 'cycle_id');
    }
}