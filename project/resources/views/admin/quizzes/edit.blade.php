@extends('layouts.admin')

@section('page-title', 'Modifier le Quiz')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Modifier le Quiz</h2>
    <form action="{{ route('quizzes.update', $quiz) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="titre" class="block text-sm font-medium text-gray-700 mb-1">Titre du quiz</label>
                <input type="text" id="titre" name="titre" value="{{ $quiz->titre }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
            </div>
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                <select id="category_id" name="category_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $quiz->category_id == $category->id ? 'selected' : '' }}>{{ $category->titre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="duree" class="block text-sm font-medium text-gray-700 mb-1">Durée (minutes)</label>
                <input type="number" id="duree" name="duree" value="{{ $quiz->duree }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
            </div>
            <div>
                <label for="score" class="block text-sm font-medium text-gray-700 mb-1">Score minimum (%)</label>
                <input type="number" id="score" name="score" value="{{ $quiz->score }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
            </div>
        </div>
        <div class="flex justify-end mt-6">
            <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white font-medium py-2 px-4 rounded-lg">
                Mettre à jour le quiz
            </button>
        </div>
    </form>
</div>
@endsection