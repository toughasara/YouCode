<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizHistory extends Model
{
    use HasFactory;

    // Spécifier la table si elle est différente du nom du modèle
    protected $table = 'quiz_history';

    // Propriétés remplissables
    protected $fillable = ['user_id', 'response_id'];

    // Relation avec User (candidat)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec Response (réponse choisie)
    public function response()
    {
        return $this->belongsTo(Response::class);
    }
}
