<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    protected $fillable = ['nom_pays'];

    // Un pays a plusieurs régions
    public function regions()
    {
        return $this->hasMany(Region::class);
    }

    // Accès direct aux concours
    public function concours()
    {
        return $this->hasMany(Concours::class);
    }
}