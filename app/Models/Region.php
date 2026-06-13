<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['pays_id', 'nom_region'];

    // Une région appartient à un pays
    public function pays()
    {
        return $this->belongsTo(Pays::class);
    }

    // Une région a plusieurs départements
    public function departements()
    {
        return $this->hasMany(Departement::class);
    }

    public function concours()
    {
        return $this->hasMany(Concours::class);
    }
}