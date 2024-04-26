<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Markle\TreeGenerationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/optimize', function () {
  Artisan::call('cache:clear');
  Artisan::call('config:cache');
  Artisan::call('route:cache');
  Artisan::call('view:clear');
  Artisan::call('optimize:clear');
    echo "cache clear";
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::controller(HomeController::class)->group(function () {
    Route::get('/hash', 'hash')->name('hash');
    Route::get('/transaction', 'transaction')->name('transaction');
    Route::get('/block', 'block')->name('block');
    Route::get('/block-chain', 'blockchain')->name('blockchain');
    Route::get('/distributed', 'distributed')->name('distributed');
    Route::get('/advance-blockchain', 'advance')->name('advance');

    Route::get('/data-insertion', 'dataInsertion')->name('dataInsertion');
    Route::get('/private-network', 'privateNetwork')->name('privateNetwork');


    Route::get('/note', 'note')->name('note');
    Route::get('/test', 'test')->name('test');

    Route::get('/note/detail/{id}', 'noteDetail')->name('note.detail');

    Route::post('/makeHashData', 'makeHashData')->name('makeHashData');

    //========= QUIZ =========//
    Route::get('/quiz', 'quiz')->name('quiz');
    Route::get('/quiz/start/{id}/{time}', 'quizStart')->name('quiz.start');
    Route::get('/quiz/retake/{id}/{time}', 'quizRetake')->name('quiz.retake');
    Route::get('/quiz/review/{id}', 'quizReview')->name('quiz.review');
    
    Route::get('/quiz/submit', 'quizSubmit')->name('quiz.submit');
    Route::get('/quiz/reviewAfterSubmit', 'reviewAfterSubmit')->name('quiz.reviewAfterSubmit');
    
    Route::get('/quiz/clear', 'clearQuiz')->name('quiz.clear');
});



Route::get('/tree', [TreeGenerationController::class, 'index'])->name('tree');
Route::get('/genarate-tree', [TreeGenerationController::class, 'genrateTree'])->name('tree.genarate');
Route::get('tree/generatedView/{number}', [TreeGenerationController::class, 'generateTreeView'])->name('tree.genrateTreeView');

