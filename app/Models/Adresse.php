<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', // L'ID de l'utilisateur associé à l'adresse
        'rue',
        'numero_de_rue',
        'ville',
        'code_postal',
    ];

    // Relation avec le modèle User (chaque adresse appartient à un utilisateur)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
