<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $fillable = ['cycle_id', 'nom_filiere'];

    // Une filière appartient à un cycle
    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }

    // Une filière a plusieurs spécialités
    public function specialites()
    {
        return $this->hasMany(Specialite::class);
    }

    // Une filière a plusieurs concours (si tu en as dans ton projet)
    public function concours()
    {
        return $this->hasMany(Concours::class);
    }
}