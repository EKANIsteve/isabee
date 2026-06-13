<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    use HasFactory;

    // Colonnes que l'on peut remplir en mass-assignment
    protected $fillable = [
        'titre',
        'contenu',
        'lien',
    ];
}