<?php

namespace App\Http\Controllers\Admin;

use App\Models\Quiz;
use App\Models\Question;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Quiz $quiz)
    {
        $categories = Category::all(); 
        return view('admin.questions.create', compact('quiz', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Quiz $quiz)
    {
        $request->validate([
            'content' => 'required|string',
            'points' => 'required|integer|min:1',
            'reponses' => 'required|array|min:4',
            'reponses.*' => 'required|string',
            'correct' => 'required|integer|min:1|max:4',
        ]);

        $question = $quiz->questions()->create([
            'content' => $request->input('content'),
            'points' => $request->input('points'),
            'category_id' => $request->input('category_id', $quiz->category_id),
        ]);

        foreach ($request->input('reponses') as $index => $content) {
            if (!empty($content)) {
                $question->reponses()->create([
                    'content' => $content,
                    'is_correct' => $index + 1 == $request->input('correct'),
                ]);
            }
        }

        return redirect()->route('quizzes.show', $quiz)->with('success', 'Question ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz, Question $question)
    {
        return view('admin.questions.edit', compact('quiz', 'question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz, Question $question)
    {
        $request->validate([
            'content' => 'required|string',
            'points' => 'required|integer|min:1',
            'reponses' => 'required|array|min:4',
            'correct' => 'required|integer|min:1|max:4',
        ]);

        $question->update([
            'content' => $request->input('content'),
            'points' => $request->input('points'),
        ]);

        $question->reponses()->delete();

        foreach ($request->input('reponses') as $index => $content) {
            $question->reponses()->create([
                'content' => $content,
                'is_correct' => $index + 1 == $request->input('correct'),
            ]);
        }

        return redirect()->route('quizzes.questions.show', $quiz)->with('success', 'Question mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz, Question $question)
    {
        $quiz->questions()->detach($question->id);

        return redirect()->route('quizzes.show', $quiz)->with('success', 'Question supprimée avec succès.');
    }
    
}
