<?php

use App\Http\Controllers\api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MushroomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\api\MushroomControllerAPI;
use App\Http\Controllers\CheckMushroomController;



Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('user')->group(function () {

        Route::get('/mushrooms', [AuthControllerAPI::class, 'mushrooms']);
        Route::post('/recommendations', [AuthController::class, 'recommendations']);
        Route::get('/article', [AuthController::class, 'article']);
        Route::get('/summary-result', [AuthController::class, 'summary-result']);
        Route::post('/check_mushroom', [CheckMushroomController::class, 'index']);

    });

});



Route::post('/recommendations', [AuthController::class, 'recommendations']);

//ROUTE FOR LOGIN
Route::post('/login', [AuthController::class, 'login']);
//ROUTE FOR MUSHHROMS
Route::apiResource('mushrooms', MushroomController::class);

Route::post('/mushrooms', [MushroomController::class, 'store']);
Route::get('/mushrooms/{id}', [MushroomController::class, 'show']);
Route::put('/mushrooms/{id}', [MushroomController::class, 'update']);
Route::delete('/mushrooms/{id}', [MushroomController::class, 'destroy']);

//ROUTE FOR USERS
Route::apiResource('users', UserController::class);
//ROUTE FOR RECIPES
Route::apiResource('recipes', RecipeController::class);
//ROUTE FOR ARTICLES
Route::apiResource('articles', ArticleController::class);

Route::post('/daftar', [AuthController::class, 'daftar']);

//EDIT MUSHHROOMS
Route::put('/mushroom/{id}', [MushroomController::class, 'update'])->name('mushroom.update');
Route::delete('/mushroom/{id}', [MushroomController::class, 'destroy'])->name('mushroom.destroy');

