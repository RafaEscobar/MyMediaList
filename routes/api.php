<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MediumController;
use App\Http\Controllers\PendingPriorityController;
use App\Http\Controllers\PostViewPriorityController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\SagaController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function(){
    Route::post('/login', 'login');
    Route::post('/register', 'register');
});

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/pending-priorities', PendingPriorityController::class)->only(['index']);
    Route::apiResource('/post-view-priorities', PostViewPriorityController::class)->only(['index']);
    Route::apiResource('/categories', CategoryController::class)->only(['index']);
    Route::apiResource('/statuses', StatusController::class)->only(['index']);
    Route::apiResource('/medias', MediumController::class);
    Route::apiResource('/sagas', SagaController::class);
    Route::apiResource('/chapters', ChapterController::class);
    Route::apiResource('/favorites', FavoriteController::class);
    Route::apiResource('/ranking', RankingController::class)->only(['index']);
});
