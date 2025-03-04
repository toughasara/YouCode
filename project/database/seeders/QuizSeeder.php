<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Category;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quiz::truncate();

        // Créez des données de test
        $quizzes = [
            [
                'titre' => 'Quiz de culture générale',
                'duree' => 30,
                'score' => 80,
                'category_id' => 1, // Assurez-vous que cette catégorie existe
            ],
            [
                'titre' => 'Quiz de programmation',
                'duree' => 45,
                'score' => 90,
                'category_id' => 2, // Assurez-vous que cette catégorie existe
            ],
            [
                'titre' => 'Quiz de mathématiques',
                'duree' => 60,
                'score' => 70,
                'category_id' => 3, // Assurez-vous que cette catégorie existe
            ],
        ];

        // Insérez les données dans la table
        foreach ($quizzes as $quiz) {
            Quiz::create($quiz);
        }
    }
}
