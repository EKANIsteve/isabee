<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    // Table associée (facultatif si la table s'appelle "personnels")
    protected $table = 'personnels';

    // Les champs qu'on peut remplir via create() ou update()
    protected $fillable = [
        'nom',
        'poste',
        'photo',
        'site_web',
        'linkedin',
        'twitter',
    ];
}