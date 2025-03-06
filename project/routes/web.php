<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\RedirectController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\QuizHistoryController;


Route::get('/candidat/quiz/{id}', [QuizHistoryController::class, 'showQuiz'])->name('candidat.quiz')->middleware('auth');
Route::get('/candidat/quiz/start', [QuizHistoryController::class, 'storeResponse'])->name('quiz.start')->middleware('auth');

// Route::get('candidat', [QuizHistoryController::class, 'showQuiz'])->name('candidat.quiz');

Route::resource('quizzes', QuizController::class);
Route::post('quizzes/{quiz}/questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');
Route::resource('quizzes.questions', QuestionController::class)->shallow()->except('destroy');
Route::post('/quiz-history', [QuizHistoryController::class, 'store']);


// rediriction apret login
Route::get('/redirect', [RedirectController::class, 'redirectUser'])->middleware(['auth']);
// Route::get('/candidat/quiz', [QuizHistoryController::class, 'showQuiz'])->name('candidat.quiz');
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/quiz', [AdminDashboardController::class, 'quiz'])->name('admin.quiz');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->group(function () {
        // Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/users', [AdminDashboardController::class, 'users'])->name('admin.users');
        Route::get('/admin/roles', [AdminDashboardController::class, 'roles'])->name('admin.roles');
    });
});

Route::get('/dashboard', [RedirectController::class, 'redirectUser'])->middleware(['auth'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
