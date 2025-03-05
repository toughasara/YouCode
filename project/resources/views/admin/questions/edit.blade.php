@extends('layouts.admin')

@section('page-title', 'Modifier la Question')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Modifier la Question</h2>
    <form action="{{ route('quizzes.questions.update', [$quiz, $question]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Question</label>
            <textarea id="content" name="content" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">{{ $question->content }}</textarea>
        </div>
        <div class="mb-6">
            <label for="points" class="block text-sm font-medium text-gray-700 mb-1">Points</label>
            <input type="number" id="points" name="points" value="{{ $question->points }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
        </div>
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Réponses</h3>
            @foreach($question->reponses as $index => $reponse)
                <div class="mb-4">
                    <label for="reponse{{ $index + 1 }}" class="block text-sm font-medium text-gray-700 mb-1">Réponse {{ $index + 1 }}</label>
                    <input type="text" id="reponse{{ $index + 1 }}" name="reponses[]" value="{{ $reponse->content }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                    <div class="mt-2">
                        <input type="radio" id="correct{{ $index + 1 }}" name="correct" value="{{ $index + 1 }}" {{ $reponse->is_correct ? 'checked' : '' }} class="mr-2">
                        <label for="correct{{ $index + 1 }}" class="text-sm text-gray-700">Correcte</label>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-end mt-6">
            <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white font-medium py-2 px-4 rounded-lg">
                Mettre à jour la question
            </button>
        </div>
    </form>
</div>
@endsection