@extends('layouts.admin')

@section('page-title', 'Ajouter une Question')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <!-- <h2 class="text-xl font-semibold text-gray-800 mb-4">Ajouter une Question</h2> -->
    <form action="{{ route('questions.store', $quiz) }}" method="POST">
        @csrf
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
            <select id="category_id" name="category_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->titre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Question</label>
            <textarea id="content" name="content" rows="3" placeholder="Entrez votre question" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500"></textarea>
        </div>
        <div class="mb-6">
            <label for="points" class="block text-sm font-medium text-gray-700 mb-1">Points</label>
            <input type="number" id="points" name="points" placeholder="10" min="1" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
        </div>
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Réponses</h3>
            @for($i = 1; $i <= 4; $i++)
                <div class="mb-4">
                    <label for="reponse{{ $i }}" class="block text-sm font-medium text-gray-700 mb-1">Réponse {{ $i }}</label>
                    <input type="text" id="reponse{{ $i }}" name="reponses[]" placeholder="Entrez la réponse {{ $i }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                    <div class="mt-2">
                        <input type="radio" id="correct{{ $i }}" name="correct" value="{{ $i }}" class="mr-2">
                        <label for="correct{{ $i }}" class="text-sm text-gray-700">Correcte</label>
                    </div>
                </div>
            @endfor
        </div>
        <div class="flex justify-end mt-6">
            <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white font-medium py-2 px-4 rounded-lg">
                Enregistrer la question
            </button>
        </div>
    </form>
</div>
@endsection