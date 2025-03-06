<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizHistory;
use App\Models\Category;
use App\Models\Question;
use App\Models\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuizHistoryController extends Controller
{

    public function showQuiz()
    {
        try { 
            
            $quiz = Quiz::where('is_active', true)
                    ->with('category')
                    ->withCount('questions')
                    ->first();

            if (!$quiz) {
                // return redirect()->back()->with('error', 'Aucun quiz actif disponible.');
                dd("Aucun quiz actif disponible");
            }

            $candidatId = auth()->id();

            if (QuizHistory::count() > 0) {
                $canTakeQuiz = !QuizHistory::where('candidat_id', $candidatId)->exists();
                // dd($quizHistory); // Devrait retourner false si aucun enregistrement n'est trouvé
            } else {
                $canTakeQuiz = true;
                // dd('La table quiz_history est vide');
            }

            // dd($canTakeQuiz);
            
            return view('candidate.quizDetails', compact('quiz', 'canTakeQuiz'));

        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

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
