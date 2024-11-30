<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MushroomController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MushroomSummaryController;
use App\Http\Controllers\CheckMushroomController;




Route::get('/', function () {
    return view('welcome');
});
//DASHBIOARD
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('mushroom', \App\Http\Controllers\MushroomController::class);
});



// route untuk jamur edible atau engga
Route::get('/mushrooms/edible', [MushroomController::class, 'edible'])->name('mushroom.edible');
Route::get('/mushrooms/inedible', [MushroomController::class, 'inedible'])->name('mushroom.inedible');
//rekomedasi route
Route::resource('recommendations', RecommendationController::class);
//article
Route::resource('articles', ArticleController::class);
//summary result
Route::get('/summary-results', [MushroomSummaryController::class, 'index'])->name('summary-results.index');
Route::resource('summary-results', MushroomSummaryController::class);

Route::middleware('auth')->group(function () {
    Route::get('/mushrooms/edible', [MushroomController::class, 'edible'])->name('mushroom.edible');
    Route::get('/mushrooms/inedible', [MushroomController::class, 'inedible'])->name('mushroom.inedible');
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/recommendations', [RecommendationController::class, 'index'])->name('recommendations.index');
});



    
    // Rute untuk Admin (CRUD)
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::resource('mushroom', MushroomController::class);
        Route::resource('recommendations', RecommendationController::class);
        Route::resource('articles', ArticleController::class);
        Route::resource('summary-results', MushroomSummaryController::class);
    });

  

require __DIR__.'/auth.php';
