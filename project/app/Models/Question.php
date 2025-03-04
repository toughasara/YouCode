<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'points', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reponses()
    {
        return $this->hasMany(Reponse::class);
    }

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class, 'quiz_question');
    }
}
