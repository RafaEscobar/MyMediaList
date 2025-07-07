<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function(){
    Route::post('/login', 'login');
    Route::post('/register', 'register');
});

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/categories', CategoryController::class)->only(['index']);
    Route::apiResource('/contents', ContentController::class);
    Route::apiResource('/chapters', ChapterController::class)->only(['store', 'update', 'destroy']);
});
