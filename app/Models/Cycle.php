<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    protected $fillable = ['nom_cycle'];

    // Un cycle a plusieurs filières
    public function filieres()
    {
        return $this->hasMany(Filiere::class);
    }

    // Un cycle a plusieurs concours
    public function concours()
    {
        return $this->hasMany(Concours::class);
    }
}