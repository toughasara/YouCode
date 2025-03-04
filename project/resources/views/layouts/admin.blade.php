<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouCode - Tableau de bord administrateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                            900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.8;
            }
        }
        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    @php
        $currentRoute = request()->route()->getName();
    @endphp
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="bg-primary-700 text-white w-64 flex-shrink-0 hidden md:block">
            <div class="p-4 text-center">
                <span class="text-white text-2xl font-bold">YouCode</span>
                <p class="text-primary-200 text-sm">Administration</p>
            </div>
            <div class="border-t border-primary-600"></div>
            <nav class="mt-5">
                <a href="{{ route('admin.dashboard') }}" 
                    class="flex items-center py-3 px-6 text-white transition 
                        {{ $currentRoute == 'admin.dashboard' ? 'bg-primary-800 bg-opacity-50' : 'hover:bg-primary-800 hover:bg-opacity-30' }}">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Tableau de bord
                </a>
                <a href="{{ route('admin.dashboard') }}" 
                    class="flex items-center py-3 px-6 text-white transition 
                        {{ $currentRoute == 'admin.candidats' ? 'bg-primary-800 bg-opacity-50' : 'hover:bg-primary-800 hover:bg-opacity-30' }}">
                    <i class="fas fa-user-graduate mr-3"></i>
                    Candidats
                </a>
                <a href="{{ route('admin.dashboard') }}" 
                    class="flex items-center py-3 px-6 text-white transition 
                        {{ $currentRoute == 'admin.staff' ? 'bg-primary-800 bg-opacity-50' : 'hover:bg-primary-800 hover:bg-opacity-30' }}">
                    <i class="fas fa-users-cog mr-3"></i>
                    Staff
                </a>
                <a href="{{ route('admin.dashboard') }}" 
                    class="flex items-center py-3 px-6 text-white transition 
                        {{ $currentRoute == 'admin.quiz' ? 'bg-primary-800 bg-opacity-50' : 'hover:bg-primary-800 hover:bg-opacity-30' }}">
                    <i class="fas fa-clipboard-question mr-3"></i>
                    Quiz
                </a>
                <a href="{{ route('admin.dashboard') }}" 
                    class="flex items-center py-3 px-6 text-white transition 
                        {{ $currentRoute == 'admin.tests' ? 'bg-primary-800 bg-opacity-50' : 'hover:bg-primary-800 hover:bg-opacity-30' }}">
                    <i class="fas fa-calendar-check mr-3"></i>
                    Tests présentiels
                </a>
                <a href="{{ route('admin.dashboard') }}" 
                    class="flex items-center py-3 px-6 text-white transition 
                        {{ $currentRoute == 'admin.settings' ? 'bg-primary-800 bg-opacity-50' : 'hover:bg-primary-800 hover:bg-opacity-30' }}">
                    <i class="fas fa-cog mr-3"></i>
                    Paramètres
                </a>
            </nav>
            <div class="absolute bottom-0 w-64 border-t border-primary-600 p-4">
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Déconnexion
                </a>
            </div>
        </div>

        <!-- Mobile sidebar toggle -->
        <div class="md:hidden fixed bottom-0 left-0 right-0 z-50 bg-primary-700 text-white p-4">
            <div class="flex justify-around">
                <a href="#" class="text-center px-3">
                    <i class="fas fa-tachometer-alt text-lg"></i>
                    <p class="text-xs">Accueil</p>
                </a>
                <a href="#" class="text-center px-3">
                    <i class="fas fa-user-graduate text-lg"></i>
                    <p class="text-xs">Candidats</p>
                </a>
                <a href="#" class="text-center px-3">
                    <i class="fas fa-users-cog text-lg"></i>
                    <p class="text-xs">Staff</p>
                </a>
                <a href="#" class="text-center px-3 text-primary-300">
                    <i class="fas fa-clipboard-question text-lg"></i>
                    <p class="text-xs">Quiz</p>
                </a>
                <a href="#" class="text-center px-3">
                    <i class="fas fa-ellipsis-h text-lg"></i>
                    <p class="text-xs">Plus</p>
                </a>
            </div>
        </div>

        <!-- Content -->
        <div class="flex-1 overflow-x-hidden overflow-y-auto">
            <!-- Topbar -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                        <button id="sidebarToggle" class="text-gray-500 focus:outline-none md:hidden">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h1 class="text-xl font-semibold text-gray-700 ml-4">@yield('page-title', 'Tableau de bord')</h1>
                    </div>
                    <div class="flex items-center">
                        <div class="relative">
                            <button class="flex text-sm rounded-full focus:outline-none">
                                <img class="h-8 w-8 rounded-full object-cover" src="/api/placeholder/32/32" alt="Admin">
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Toggle mobile sidebar
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobileMenu');
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
            } else {
                mobileMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>