<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arrondissement extends Model
{
    protected $fillable = ['departement_id', 'nom_arrondissement'];

    // Un arrondissement appartient à un département
    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    // Un arrondissement a plusieurs districts
    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function concours()
    {
        return $this->hasMany(Concours::class);
    }
}