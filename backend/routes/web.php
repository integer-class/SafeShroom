<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MushroomController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\ArticleController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('mushroom', \App\Http\Controllers\MushroomController::class);
});
//view untuk dashbaord
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//route untuk jamur edible atau engga
Route::get('/mushrooms/edible', [MushroomController::class, 'edible'])->name('mushroom.edible');
Route::get('/mushrooms/inedible', [MushroomController::class, 'inedible'])->name('mushroom.inedible');

//rekomedasi route
Route::resource('recommendations', RecommendationController::class);
//article
Route::resource('articles', ArticleController::class);






require __DIR__.'/auth.php';
