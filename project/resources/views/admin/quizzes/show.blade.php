@extends('layouts.admin')

@section('page-title', "Questions d'un quiz")

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Questions du Quiz : {{ $quiz->titre }}</h2>
    <a href="{{ route('quizzes.questions.create', $quiz) }}" class="bg-primary-600 hover:bg-primary-700 text-white font-medium py-2 px-4 rounded-lg mb-6 inline-block">
        Ajouter une question
    </a>
    <div class="space-y-4">
        @foreach($quiz->questions as $question)
            <div class="bg-gray-50 p-4 rounded-md">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-lg font-medium text-gray-800">{{ $question->content }}</h3>
                    
                </div>
                <div class="ml-4">
                    @foreach($question->reponses as $reponse)
                        <div class="flex items-center mb-2">
                            <input type="radio" disabled class="mr-2">
                            <span class="text-sm text-gray-700">{{ $reponse->content }}</span>
                            @if($reponse->is_correct)
                                <span class="ml-2 text-sm text-green-600">(Correcte)</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection