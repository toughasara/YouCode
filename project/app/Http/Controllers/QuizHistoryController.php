<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizHistory;
use App\Models\Response;
use Illuminate\Http\Request;

class QuizHistoryController extends Controller
{

    public function storeResponse(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'quiz_id' => 'required|exists:quizzes,id',
            'response_id' => 'required|exists:responses,id',
            'question_id' => 'required|exists:questions,id',
        ]);

        QuizHistory::create([
            'user_id' => $request->user_id,
            'response_id' => $request->response_id,
        ]);

        return response()->json(['message' => 'Réponse enregistrée avec succès']);
    }

    public function finQuiz(Request $request){

        $quiz = Quiz::find($request->quiz_id);
        $totalScore = $quiz->questions->sum('points');
        $reponseCorrect = 0;

        $response = Response::find($request->response_id);
        if ($response->is_correct) {
            $question = $response->question;
            $reponseCorrect += $question->points;
        }

        $scoreCandidat = ($reponseCorrect / $totalScore) * 100;

        // return response()->json([
        //     'score' => $scorePercentage,
        // ]);
    }

}
