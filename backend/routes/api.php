<?php

use App\Http\Controllers\api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MushroomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ArticleController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    
});
//ROUTE FOR LOGIN
Route::post('/login', [AuthController::class, 'login']);
//ROUTE FOR MUSHHROMS 
Route::apiResource('mushrooms', MushroomController::class);
Route::get('/mushrooms', [MushroomController::class, 'index']);
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