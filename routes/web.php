<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserAnswerController;
use App\Http\Controllers\UserController;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::any('/ansDesk',function(){
    return view('answerDesk');
});
Route::any('/questions',);
Route::any('/start',[QuestionController::class, 'checkTest'])->name('start');
Route::any('/end',function(){
    return view('end');
});

Route::post('/submitans', [QuestionController::class, 'submitans'])->name('submitans');
Route::get('/startquiz', [QuestionController::class, 'startQuiz'])->name('startQuiz');
Route::post('/add', [QuestionController::class, 'add'])->name('add');
Route::put('/update/{id}', [QuestionController::class, 'update'])->name('update');
Route::get('/questions', [QuestionController::class, 'show'])->name('show');
Route::delete('/delete/{id}', [QuestionController::class, 'delete'])->name('questions.delete');


// ------- Dashboard Routes -------
Route::get('/dashboard/users', [UserController::class , 'index'])->name('users.index');
Route::get('/dashboard/userAnswers/{userId}', [UserAnswerController::class , 'userAnswers'])->name('userAnswers');
Route::get('/dashboard/deleteAnswers/{userId}', [UserAnswerController::class , 'deleteAnswer'])->name('userAnswers.delete');
