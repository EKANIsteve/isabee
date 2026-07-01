<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Champs autorisés à être enregistrés automatiquement.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * Champs cachés lors de l'affichage.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversion automatique des champs.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Vérifie si l'utilisateur est Super Admin.
     */
    public function isSuperAdmin(): bool
    {
        return $this->role === 'super_admin';
    }

    /**
     * Vérifie si l'utilisateur est Admin ou Super Admin.
     */
   

    /**
     * Vérifie si l'utilisateur appartient à la scolarité.
     */
 

    /**
     * Vérifie si l'utilisateur peut seulement consulter.
     */
    public function isViewer(): bool
    {
        return $this->role === 'viewer';
    }


public function isAdmin(): bool
{
    return in_array($this->role, ['super_admin', 'admin'], true);
}

public function isScolarite(): bool
{
    return $this->role === 'scolarite';
}


}