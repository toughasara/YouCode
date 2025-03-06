<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Details - YouCode</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="#" class="flex-shrink-0">
                        <img class="h-8 w-8" src="/api/placeholder/32/32" alt="Logo YouCode">
                    </a>
                    <div class="ml-4">
                        <div class="text-lg font-semibold text-gray-700">YouCode</div>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="ml-4 flex items-center md:ml-6">
                        <button type="button" class="bg-primary-600 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-primary-700 transition">
                            <i class="fas fa-user mr-2"></i>Profil
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 flex-grow">
        <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $quiz->titre }}</h1>
                    <div class="flex items-center space-x-4 text-gray-600">
                        <div class="flex items-center">
                            <i class="fas fa-layer-group mr-2 text-blue-500"></i>
                            <span>Catégorie: {{ $quiz->category->titre ?? 'Non catégorisé' }}</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-clock mr-2 text-green-500"></i>
                            <span>Durée: {{ $quiz->duree }} minutes</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg mb-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-2">Description</h2>
                    <p class="text-gray-600">{{ $quiz->description ?? 'Aucune description disponible' }}</p>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <h3 class="text-md font-medium text-blue-800 mb-2">Nombre de Questions</h3>
                        <p class="text-blue-600 font-bold">{{ $quiz->questions_count }}</p>
                    </div>
                    <div class="bg-green-50 p-4 rounded-lg">
                        <h3 class="text-md font-medium text-green-800 mb-2">Score Minimum Requis</h3>
                        <p class="text-green-600 font-bold">{{ $quiz->score }}%</p>
                    </div>
                </div>

                <div class="text-center">
                    @if($canTakeQuiz)
                        <a href="{{ route('quiz.start', $quiz->id) }}" class="bg-primary-600 hover:bg-primary-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 inline-flex items-center">
                            <i class="fas fa-play mr-2"></i>
                            Commencer le Quiz
                        </a>
                    @else
                        <div class="bg-red-50 p-4 rounded-lg text-red-600">
                            <i class="fas fa-times-circle mr-2"></i>
                            Vous avez déjà passé ce quiz.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="text-center text-gray-500">
                © {{ date('Y') }} YouCode. Tous droits réservés.
            </div>
        </div>
    </footer>
</body>
</html>