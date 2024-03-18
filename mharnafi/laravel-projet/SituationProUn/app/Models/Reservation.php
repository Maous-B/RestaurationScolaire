<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // L'ID de l'utilisateur associé à la réservation
        'date',    // La date de la réservation
        // Ajoute d'autres colonnes si nécessaire
    ];

    // Relation avec le modèle User (chaque réservation appartient à un utilisateur)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
