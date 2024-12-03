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

        Route::get('/mushrooms', [AuthController::class, 'mushrooms']);
        Route::post('/recommendations', [AuthController::class, 'recommendations']);
        Route::get('/article', [AuthController::class, 'article']);
        Route::get('/summary-result', [AuthController::class, 'summary-result']);
        Route::post('/check_mushroom', [CheckMushroomController::class, 'index']);

    });

});

Route::post('/check_mushroom', [CheckMushroomController::class, 'index']);
Route::get('/mushrooms', [AuthController::class, 'mushrooms']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/daftar', [AuthController::class, 'daftar']);
Route::post('/recommendations', [AuthController::class, 'recommendations']);

e


