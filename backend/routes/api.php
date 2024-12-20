<?php

use App\Http\Controllers\api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MushroomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CheckMushroomController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MushroomControllerAPI;


Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('user')->group(function () {

        Route::get('/mushrooms', [AuthController::class, 'mushrooms']);
        Route::post('/recommendations', [AuthController::class, 'recommendations']);
        Route::get('/summary-result', [AuthController::class, 'summary-result']);
        Route::post('/check_mushroom', [CheckMushroomController::class, 'index']);


    });

});

Route::get('/article', [HistoryController::class, 'article']);


Route::post('/history', [HistoryController::class, 'store']);
Route::get('/history/{id_user}', [HistoryController::class, 'index']);
Route::post('/check_mushroom', [CheckMushroomController::class, 'index']);
Route::get('/mushrooms', [AuthController::class, 'mushrooms']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/daftar', [AuthController::class, 'daftar']);
Route::post('/recommendations', [AuthController::class, 'recommendations']);
Route::get('/getMushroom', [MushroomControllerAPI::class, 'index']);





