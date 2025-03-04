<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouCode - Plateforme de Candidature</title>
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
        .hero-waves {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 60px;
            z-index: 5;
            opacity: 0.8;
        }
        
        .parallax > use {
            animation: move-forever 25s cubic-bezier(.55,.5,.45,.5) infinite;
        }
        
        .parallax > use:nth-child(1) {
            animation-delay: -2s;
            animation-duration: 7s;
        }
        
        .parallax > use:nth-child(2) {
            animation-delay: -3s;
            animation-duration: 10s;
        }
        
        .parallax > use:nth-child(3) {
            animation-delay: -4s;
            animation-duration: 13s;
        }
        
        .parallax > use:nth-child(4) {
            animation-delay: -5s;
            animation-duration: 20s;
        }
        
        @keyframes move-forever {
            0% {
                transform: translate3d(-90px,0,0);
            }
            100% { 
                transform: translate3d(85px,0,0);
            }
        }
        
        @keyframes float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
            100% {
                transform: translateY(0px);
            }
        }
        
        .floating-image {
            animation: float 6s ease-in-out infinite;
        }
        
        .modal {
            transition: opacity 0.25s ease;
        }
    </style>
</head>
<body class="bg-white font-sans">
    <!-- Navigation -->
    <nav class="bg-white shadow-md fixed top-0 w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-primary-700 text-2xl font-bold">YouCode</span>
                </div>
                <div class="hidden md:ml-6 md:flex md:items-center md:space-x-4">
                    <a href="#" class="text-gray-600 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition">Accueil</a>
                    <a href="#about" class="text-gray-600 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition">À propos</a>
                    <a href="#programs" class="text-gray-600 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition">Programmes</a>
                    <a href="#contact" class="text-gray-600 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition">Contact</a>
                </div>
                <div class="flex items-center space-x-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 border border-primary-600 text-primary-600 rounded-md font-medium hover:bg-primary-50 transition">Connexion</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 transitione">Inscription</a>
                        @endif
                    @endauth
                </div>
                <!-- <div class="flex items-center space-x-3">
                    <button id="loginBtn" class="inline-flex items-center px-4 py-2 border border-primary-600 text-primary-600 rounded-md font-medium hover:bg-primary-50 transition">
                        Connexion
                    </button>
                    <button id="registerBtn" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 transition">
                        Inscription
                    </button>
                </div> -->
                <div class="flex items-center md:hidden">
                    <button id="mobileMenuBtn" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile menu, show/hide based on menu state -->
        <div id="mobileMenu" class="hidden md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#" class="text-gray-600 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium">Accueil</a>
                <a href="#about" class="text-gray-600 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium">À propos</a>
                <a href="#programs" class="text-gray-600 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium">Programmes</a>
                <a href="#contact" class="text-gray-600 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="relative pt-16 pb-32 flex content-center items-center justify-center bg-primary-700" style="min-height: 75vh;">
        <div class="absolute top-0 w-full h-full bg-center bg-cover" style="background-image: url('https://api.placeholder/1920/1080');"></div>
        <div class="container relative mx-auto">
            <div class="flex flex-wrap items-center">
                <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                    <div class="flex flex-col md:flex-row items-center justify-center gap-8">
                        <div class="md:w-1/2 text-left">
                            <h1 class="text-white font-semibold text-5xl mb-6">
                                Votre avenir <span class="text-blue-200">commence ici</span>
                            </h1>
                            <p class="mt-4 text-lg text-gray-200">
                                Rejoignez notre école d'excellence et transformez votre passion en compétences professionnelles reconnues.
                            </p>
                            <div class="mt-8">
                                <a href="#" id="applyNowBtn" class="px-6 py-3 bg-white text-primary-700 font-bold uppercase text-sm rounded-lg shadow hover:shadow-lg transition-all duration-150 ease-in-out">
                                    Postuler maintenant
                                </a>
                            </div>
                        </div>
                        <div class="md:w-1/2">
                            <img src="https://images.app.goo.gl/KhsVhQRALC83okTo8" alt="Students" class="floating-image rounded-lg shadow-xl max-w-full h-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Waves effect -->
        <div class="hero-waves">
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255, 255, 255, 0.7)"></use>
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255, 255, 255, 0.5)"></use>
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255, 255, 255, 0.3)"></use>
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="rgba(255, 255, 255, 1)"></use>
                </g>
            </svg>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap items-center">
                <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                    <div class="text-gray-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-primary-50">
                        <i class="fas fa-graduation-cap text-primary-600 text-xl"></i>
                    </div>
                    <h3 class="text-3xl mb-2 font-semibold leading-normal text-gray-800">
                        Notre établissement d'excellence
                    </h3>
                    <p class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700">
                        Fondée en 2005, YouCode est une institution reconnue dans le domaine de l'enseignement supérieur. 
                        Notre mission est de former les leaders de demain à travers une pédagogie innovante et un accompagnement personnalisé.
                    </p>
                    <p class="text-lg font-light leading-relaxed mt-0 mb-4 text-gray-700">
                        Nous mettons l'accent sur l'excellence académique, l'innovation pédagogique et les partenariats avec les entreprises 
                        pour garantir l'insertion professionnelle de nos diplômés.
                    </p>
                    <a href="#" class="font-bold text-primary-600 hover:text-primary-800 mt-8 inline-block">
                        En savoir plus <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <div class="w-full md:w-6/12 px-4 mr-auto ml-auto mt-12 md:mt-0">
                    <div class="relative flex flex-col min-w-0 w-full mb-6 shadow-lg rounded-lg bg-primary-600">
                        <img alt="Campus" src="/api/placeholder/400/320" class="w-full align-middle rounded-t-lg">
                        <blockquote class="relative p-8 mb-4">
                            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95" class="absolute left-0 w-full block h-16 -top-16">
                                <polygon points="0,95 583,95 583,65" class="text-primary-600 fill-current"></polygon>
                            </svg>
                            <h4 class="text-xl font-bold text-white">Nos valeurs</h4>
                            <p class="text-md font-light mt-2 text-white">
                                Excellence académique, innovation, inclusion, éthique et responsabilité - ces valeurs sont au cœur de notre 
                                approche pédagogique et guident chacune de nos actions.
                            </p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="pt-20 pb-48 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center text-center mb-24">
                <div class="w-full lg:w-6/12 px-4">
                    <h2 class="text-4xl font-semibold text-gray-800">Nos points forts</h2>
                    <p class="text-lg leading-relaxed m-4 text-gray-600">
                        Découvrez ce qui fait la spécificité de YouCode et pourquoi nos étudiants réussissent.
                    </p>
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-full md:w-4/12 px-4 text-center mb-12">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-primary-600">
                                <i class="fas fa-award"></i>
                            </div>
                            <h6 class="text-xl font-semibold">Enseignement de qualité</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                                Notre équipe pédagogique est composée d'experts reconnus dans leur domaine, assurant un enseignement 
                                de haut niveau et à jour avec les dernières avancées.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-4/12 px-4 text-center mb-12">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-primary-600">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <h6 class="text-xl font-semibold">Partenariats professionnels</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                                Des partenariats solides avec des entreprises leaders permettent à nos étudiants de bénéficier 
                                de stages exclusifs et d'opportunités d'emploi privilégiées.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-4/12 px-4 text-center mb-12">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-primary-600">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <h6 class="text-xl font-semibold">Suivi personnalisé</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                                Chaque étudiant bénéficie d'un accompagnement sur mesure pour développer son potentiel et 
                                construire un parcours professionnel adapté à ses ambitions.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section id="programs" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center text-center mb-24">
                <div class="w-full lg:w-6/12 px-4">
                    <h2 class="text-4xl font-semibold text-gray-800">Nos programmes</h2>
                    <p class="text-lg leading-relaxed m-4 text-gray-600">
                        Des formations adaptées aux besoins du marché et aux ambitions de nos étudiants.
                    </p>
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-full md:w-4/12 px-4 mb-8">
                    <div class="relative overflow-hidden bg-white rounded-lg shadow-lg group">
                        <img alt="Program 1" src="/api/placeholder/400/300" class="w-full transition duration-300 group-hover:scale-110">
                        <div class="px-6 py-4">
                            <h5 class="text-xl font-semibold mb-2">Développement Web</h5>
                            <p class="text-gray-700 text-base">
                                Formez-vous aux technologies web les plus demandées sur le marché: HTML, CSS, JavaScript, et les frameworks modernes.
                            </p>
                        </div>
                        <div class="px-6 pt-2 pb-4">
                            <span class="inline-block bg-primary-100 text-primary-700 px-3 py-1 text-sm font-semibold rounded-full mr-2 mb-2">3 ans</span>
                            <span class="inline-block bg-primary-100 text-primary-700 px-3 py-1 text-sm font-semibold rounded-full mr-2 mb-2">Bachelor</span>
                        </div>
                    </div>
                </div>
                
                <div class="w-full md:w-4/12 px-4 mb-8">
                    <div class="relative overflow-hidden bg-white rounded-lg shadow-lg group">
                        <img alt="Program 2" src="/api/placeholder/400/300" class="w-full transition duration-300 group-hover:scale-110">
                        <div class="px-6 py-4">
                            <h5 class="text-xl font-semibold mb-2">Intelligence Artificielle</h5>
                            <p class="text-gray-700 text-base">
                                Spécialisez-vous dans l'IA, le machine learning et l'analyse de données pour répondre aux défis technologiques de demain.
                            </p>
                        </div>
                        <div class="px-6 pt-2 pb-4">
                            <span class="inline-block bg-primary-100 text-primary-700 px-3 py-1 text-sm font-semibold rounded-full mr-2 mb-2">2 ans</span>
                            <span class="inline-block bg-primary-100 text-primary-700 px-3 py-1 text-sm font-semibold rounded-full mr-2 mb-2">Master</span>
                        </div>
                    </div>
                </div>
                
                <div class="w-full md:w-4/12 px-4 mb-8">
                    <div class="relative overflow-hidden bg-white rounded-lg shadow-lg group">
                        <img alt="Program 3" src="/api/placeholder/400/300" class="w-full transition duration-300 group-hover:scale-110">
                        <div class="px-6 py-4">
                            <h5 class="text-xl font-semibold mb-2">Cybersécurité</h5>
                            <p class="text-gray-700 text-base">
                                Apprenez à protéger les systèmes informatiques et les données sensibles contre les menaces cybernétiques.
                            </p>
                        </div>
                        <div class="px-6 pt-2 pb-4">
                            <span class="inline-block bg-primary-100 text-primary-700 px-3 py-1 text-sm font-semibold rounded-full mr-2 mb-2">3 ans</span>
                            <span class="inline-block bg-primary-100 text-primary-700 px-3 py-1 text-sm font-semibold rounded-full mr-2 mb-2">Bachelor</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center text-center mb-12">
                <div class="w-full lg:w-6/12 px-4">
                    <h2 class="text-4xl font-semibold text-gray-800">Témoignages</h2>
                    <p class="text-lg leading-relaxed m-4 text-gray-600">
                        Découvrez ce que nos anciens étudiants disent de leur expérience chez YouCode.
                    </p>
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-full md:w-6/12 lg:w-4/12 px-4 mb-8">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex items-center mb-4">
                            <img src="/api/placeholder/60/60" alt="Student" class="rounded-full w-16 h-16 object-cover">
                            <div class="ml-4">
                                <h5 class="text-xl font-semibold">Sophie Martin</h5>
                                <p class="text-gray-600">Promotion 2022</p>
                            </div>
                        </div>
                        <p class="text-gray-700">
                            "YouCode m'a donné toutes les compétences nécessaires pour réussir dans le monde professionnel. 
                            Les professeurs sont passionnés et les projets pratiques m'ont permis de développer un portfolio solide."
                        </p>
                        <div class="mt-4 text-primary-500">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-6/12 lg:w-4/12 px-4 mb-8">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex items-center mb-4">
                            <img src="/api/placeholder/60/60" alt="Student" class="rounded-full w-16 h-16 object-cover">
                            <div class="ml-4">
                                <h5 class="text-xl font-semibold">Thomas Dubois</h5>
                                <p class="text-gray-600">Promotion 2021</p>
                            </div>
                        </div>
                        <p class="text-gray-700">
                            "L'accompagnement personnalisé et les partenariats professionnels de l'école m'ont permis de trouver un emploi 
                            dans une grande entreprise avant même l'obtention de mon diplôme."
                        </p>
                        <div class="mt-4 text-primary-500">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-6/12 lg:w-4/12 px-4 mb-8 mx-auto lg:mx-0">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex items-center mb-4">
                            <img src="/api/placeholder/60/60" alt="Student" class="rounded-full w-16 h-16 object-cover">
                            <div class="ml-4">
                                <h5 class="text-xl font-semibold">Emma Garcia</h5>
                                <p class="text-gray-600">Promotion 2023</p>
                            </div>
                        </div>
                        <p class="text-gray-700">
                            "La qualité de l'enseignement et l'ambiance internationale de YouCode m'ont ouvert des portes 
                            que je n'aurais jamais imaginées. Je recommande vivement cette école!"
                        </p>
                        <div class="mt-4 text-primary-500">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="relative py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center text-center mb-16">
                <div class="w-full lg:w-6/12 px-4">
                    <h2 class="text-4xl font-semibold text-gray-800">Contactez-nous</h2>
                    <p class="text-lg leading-relaxed m-4 text-gray-600">
                        Une question ? N'hésitez pas à nous contacter.
                    </p>
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-primary-50">
                        <div class="flex-auto p-8">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="full-name">
                                    Nom complet
                                </label>
                                <input type="text" class="border-0 px-3 py-3 rounded text-sm shadow w-full bg-white placeholder-gray-400 text-gray-700 outline-none focus:outline-none focus:ring" id="full-name" placeholder="Nom complet">
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="email">
                                    Email
                                </label>
                                <input type="email" class="border-0 px-3 py-3 rounded text-sm shadow w-full bg-white placeholder-gray-400 text-gray-700 outline-none focus:outline-none focus:ring" id="email" placeholder="Email">
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="message">
                                    Message
                                </label>
                                <textarea rows="4" class="border-0 px-3 py-3 rounded text-sm shadow w-full bg-white placeholder-gray-400 text-gray-700 outline-none focus:outline-none focus:ring" id="message" placeholder="Votre message..."></textarea>
                            </div>
                            
                            <div class="text-center mt-6">
                                <button class="bg-primary-600 text-white active:bg-primary-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                    Envoyer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-6/12 px-4">
                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative flex flex-col mt-4">
                                <div class="px-4 py-5 flex-auto">
                                    <div class="text-primary-600 p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-gray-50">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <h6 class="text-xl mb-1 font-semibold">Adresse</h6>
                                    <p class="mb-4 text-gray-600">
                                        123 Avenue de l'Innovation<br>
                                        75001 Paris, France
                                    </p>
                                </div>
                            </div>
                            <div class="relative flex flex-col min-w-0">
                                <div class="px-4 py-5 flex-auto">
                                    <div class="text-primary-600 p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-gray-50">
                                        <i class="fas fa-envelope"></i>