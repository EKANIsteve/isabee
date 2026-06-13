<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable = ['region_id', 'nom_departement'];

    // Un département appartient à une région
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    // Un département a plusieurs arrondissements
    public function arrondissements()
    {
        return $this->hasMany(Arrondissement::class);
    }

    public function concours()
    {
        return $this->hasMany(Concours::class);
    }
}