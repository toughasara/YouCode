@extends('layouts.admin')

@section('page-title', 'Tableau de bord')

@section('content')
                <!-- Welcome Message -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <h2 class="text-xl font-semibold text-gray-800">Bonjour, Admin</h2>
                    <p class="text-gray-600">Voici un aperçu de l'activité de YouCode aujourd'hui.</p>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-primary-100 text-primary-600">
                                <i class="fas fa-user-plus text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Nouveaux candidats</p>
                                <h3 class="text-2xl font-semibold text-gray-800">28</h3>
                                <p class="text-green-500 text-sm">+12% <span class="text-gray-500">cette semaine</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-600">
                                <i class="fas fa-clipboard-check text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Quiz complétés</p>
                                <h3 class="text-2xl font-semibold text-gray-800">42</h3>
                                <p class="text-green-500 text-sm">+8% <span class="text-gray-500">cette semaine</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-calendar-alt text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Tests planifiés</p>
                                <h3 class="text-2xl font-semibold text-gray-800">15</h3>
                                <p class="text-yellow-500 text-sm">+2% <span class="text-gray-500">cette semaine</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                                <i class="fas fa-user-check text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Candidats admis</p>
                                <h3 class="text-2xl font-semibold text-gray-800">18</h3>
                                <p class="text-green-500 text-sm">+5% <span class="text-gray-500">cette semaine</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Candidats & Staff Panels -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <!-- Candidats Panel -->
                    <div class="bg-white rounded-lg shadow-sm">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-800">Statistiques des candidats</h3>
                                <a href="#" class="text-primary-600 hover:text-primary-700 font-medium text-sm">Voir tous</a>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="mb-6">
                                <h4 class="text-sm font-medium text-gray-500 mb-3">Répartition par étape</h4>
                                <div class="relative pt-1">
                                    <div class="flex mb-2 items-center justify-between">
                                        <div>
                                            <span class="text-xs font-semibold inline-block text-primary-600">
                                                Documents soumis (35%)
                                            </span>
                                        </div>
                                        <div class="text-right">
                                            <span class="text-xs font-semibold inline-block text-primary-600">
                                                78
                                            </span>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-primary-100">
                                        <div style="width: 35%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-primary-500"></div>
                                    </div>
                                    
                                    <div class="flex mb-2 items-center justify-between">
                                        <div>
                                            <span class="text-xs font-semibold inline-block text-green-600">
                                                Quiz réussi (18%)
                                            </span>
                                        </div>
                                        <div class="text-right">
                                            <span class="text-xs font-semibold inline-block text-green-600">
                                                42
                                            </span>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-100">
                                        <div style="width: 18%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                                    </div>
                                    
                                    <div class="flex mb-2 items-center justify-between">
                                        <div>
                                            <span class="text-xs font-semibold inline-block text-blue-600">
                                                Test présentiel (8%)
                                            </span>
                                        </div>
                                        <div class="text-right">
                                            <span class="text-xs font-semibold inline-block text-blue-600">
                                                18
                                            </span>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-100">
                                        <div style="width: 8%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 mb-3">Candidats récents</h4>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                            <tr>
                                                <th class="px-3 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                                <th class="px-3 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Étape</th>
                                                <th class="px-3 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-3 py-3 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="text-sm font-medium text-gray-900">Ahmed Alami</div>
                                                    </div>
                                                </td>
                                                <td class="px-3 py-3 whitespace-nowrap">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Quiz réussi</span>
                                                </td>
                                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">26/02/2025</td>
                                            </tr>
                                            <tr>
                                                <td class="px-3 py-3 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="text-sm font-medium text-gray-900">Sara Nouri</div>
                                                    </div>
                                                </td>
                                                <td class="px-3 py-3 whitespace-nowrap">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-primary-100 text-primary-800">Documents</span>
                                                </td>
                                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">25/02/2025</td>
                                            </tr>
                                            <tr>
                                                <td class="px-3 py-3 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="text-sm font-medium text-gray-900">Karim Belkhir</div>
                                                    </div>
                                                </td>
                                                <td class="px-3 py-3 whitespace-nowrap">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Test prévu</span>
                                                </td>
                                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">24/02/2025</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Staff Panel -->
                    <div class="bg-white rounded-lg shadow-sm">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-800">Équipe pédagogique</h3>
                                <a href="#" class="text-primary-600 hover:text-primary-700 font-medium text-sm">Gérer l'équipe</a>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="mb-6">
                                <h4 class="text-sm font-medium text-gray-500 mb-3">Répartition par année</h4>
                                <div class="grid grid-cols-2 gap-4 mb-6">
                                    <div class="bg-primary-50 rounded-lg p-4">
                                        <h5 class="text-primary-700 font-semibold">1ère année</h5>
                                        <p class="text-2xl font-bold text-gray-800">4</p>
                                        <p class="text-sm text-gray-500">formateurs</p>
                                    </div>
                                    <div class="bg-primary-50 rounded-lg p-4">
                                        <h5 class="text-primary-700 font-semibold">2ème année</h5>
                                        <p class="text-2xl font-bold text-gray-800">4</p>
                                        <p class="text-sm text-gray-500">formateurs</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 mb-3">Spécialités</h4>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-yellow-50 rounded-lg p-4">
                                        <h5 class="text-yellow-700 font-semibold">JavaScript</h5>
                                        <p class="text-2xl font-bold text-gray-800">1</p>
                                        <p class="text-sm text-gray-500">formateur</p>
                                    </div>
                                    <div class="bg-red-50 rounded-lg p-4">
                                        <h5 class="text-red-700 font-semibold">Java</h5>
                                        <p class="text-2xl font-bold text-gray-800">2</p>
                                        <p class="text-sm text-gray-500">formateurs</p>
                                    </div>
                                    <div class="bg-blue-50 rounded-lg p-4">
                                        <h5 class="text-blue-700 font-semibold">Data Science</h5>
                                        <p class="text-2xl font-bold text-gray-800">1</p>
                                        <p class="text-sm text-gray-500">formateur</p>
                                    </div>
                                    <div class="bg-green-50 rounded-lg p-4">
                                        <h5 class="text-green-700 font-semibold">Web Design</h5>
                                        <p class="text-2xl font-bold text-gray-800">2</p>
                                        <p class="text-sm text-gray-500">formateurs</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Actions rapides</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <a href="#" class="flex flex-col items-center p-4 bg-primary-50 rounded-lg hover:bg-primary-100 transition">
                            <div class="p-3 rounded-full bg-primary-100 text-primary-600">
                                <i class="fas fa-plus-circle text-xl"></i>
                            </div>
                            <span class="mt-2 text-sm font-medium text-gray-700">Ajouter un candidat</span>
                        </a>
                        <a href="#" class="flex flex-col items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-clipboard-question text-xl"></i>
                            </div>
                            <span class="mt-2 text-sm font-medium text-gray-700">Gérer les quiz</span>
                        </a>
                        <a href="#" class="flex flex-col items-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition">
                            <div class="p-3 rounded-full bg-green-100 text-green-600">
                                <i class="fas fa-calendar-plus text-xl"></i>
                            </div>
                            <span class="mt-2 text-sm font-medium text-gray-700">Planifier un test</span>
                        </a>
                        <a href="#" class="flex flex-col items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition">
                            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                                <i class="fas fa-file-export text-xl"></i>
                            </div>
                            <span class="mt-2 text-sm font-medium text-gray-700">Exporter les données</span>
                        </a>
                    </div>
                </div>

                <!-- Calendar -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Calendrier des tests</h3>
                        <div class="flex">
                            <button class="text-gray-600 hover:text-primary-600 mx-1"><i class="fas fa-chevron-left"></i></button>
                            <span class="text-gray-600 mx-2">Février 2025</span>
                            <button class="text-gray-600 hover:text-primary-600 mx-1"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                    <div class="grid grid-cols-7 gap-2 mb-2">
                        <div class="text-center text-sm font-medium text-gray-500">Lun</div>
                        <div class="text-center text-sm font-medium text-gray-500">Mar</div>
                        <div class="text-center text-sm font-medium text-gray-500">Mer</div>
                        <div class="text-center text-sm font-medium text-gray-500">Jeu</div>
                        <div class="text-center text-sm font-medium text-gray-500">Ven</div>
                        <div class="text-center text-sm font-medium text-gray-500">Sam</div>
                        <div class="text-center text-sm font-medium text-gray-500">Dim</div>
                    </div>
                    <div class="grid grid-cols-7 gap-2">
                        <!-- Previous month days -->
                        <div class="text-center p-2 text-gray-400">27</div>
                        <div class="text-center p-2 text-gray-400">28</div>
                        <div class="text-center p-2 text-gray-400">29</div>
                        <div class="text-center p-2 text-gray-400">30</div>
                        <div class="text-center p-2 text-gray-400">31</div>
                        <!-- Current month days -->
                        <div class="text-center p-2">1</div>
                        <div class="text-center p-2">2</div>
                        <div class="text-center p-2">3</div>
                        <div class="text-center p-2">4</div>
                        <div class="text-center p-2">5</div>
                        <div class="text-center p-2">6</div>
                        <div class="text-center p-2">7</div>
                        <div class="text-center p-2">8</div>
                        <div class="text-center p-2">9</div>
                        <div class="text-center p-2 relative">
                            10
                            <div class="absolute -top-1 -right-1 h-2 w-2 bg-primary-500 rounded-full"></div>
                        </div>
                        <div class="text-center p-2">11</div>
                        <div class="text-center p-2">12</div>
                        <div class="text-center p-2 relative">
                            13
                            <div class="absolute -top-1 -right-1 h-2 w-2 bg-primary-500 rounded-full"></div>
                        </div>
                        <div class="text-center p-2">14</div>
                        <div class="text-center p-2">15</div>
                        <div class="text-center p-2">16</div>
                        <div class="text-center p-2">17</div>
                        <div class="text-center p-2">18</div>
                        <div class="text-center p-2">19</div>
                        <div class="text-center p-2">20</div>
                        <div class="text-center p-2">21</div>
                        <div class="text-center p-2">22</div>
                        <div class="text-center p-2">23</div>
                        <div class="text-center p-2">24</div>
                        <div class="text-center p-2 relative">
                            25
                            <div class="absolute -top-1 -right-1 h-2 w-2 bg-primary-500 rounded-full"></div>
                        </div>
                        <div class="text-center p-2">26</div>
                        <div class="text-center p-2 relative bg-primary-100 rounded">
                            27
                            <div class="absolute -top-1 -right-1 h-2 w-2 bg-primary-500 rounded-full"></div>
                        </div>
                        <div class="text-center p-2 relative">
                            28
                            <div class="absolute -top-1 -right-1 h-2 w-2 bg-green-500 rounded-full"></div>
                        </div>
                        <!-- Next month days -->
                        <div class="text-center p-2 text-gray-400">1</div>
                        <div class="text-center p-2 text-gray-400">2</div>
                        <div class="text-center p-2 text-gray-400">3</div>
                        <div class="text-center p-2 text-gray-400">4</div>
                        <div class="text-center p-2 text-gray-400">5</div>
                        <div class="text-center p-2 text-gray-400">6</div>
                        <div class="text-center p-2 text-gray-400">7</div>
                        <div class="text-center p-2 text-gray-400">8</div>
                        <div class="text-center p-2 text-gray-400">9</div>
                    </div>
                    <div class="mt-4 flex items-center">
                        <div class="flex items-center mr-4">
                            <div class="h-3 w-3 bg-primary-500 rounded-full mr-1"></div>
                            <span class="text-xs text-gray-600">Tests techniques</span>
                        </div>
                        <div class="flex items-center">
                            <div class="h-3 w-3 bg-green-500 rounded-full mr-1"></div>
                            <span class="text-xs text-gray-600">Tests administratifs</span>
                        </div>
                    </div>
                </div>
@endsection
