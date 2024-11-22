<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\FavoriteController;

        Route::post('/auth/register', [AuthController::class, 'register']);
        Route::post('/auth/signin', [AuthController::class, 'signin']);
        Route::get('/user/profile', [AuthController::class, 'profile']);
        Route::get('/user/history', [AuthController::class, 'history']);
        Route::get('/user/favorites', [AuthController::class, 'favorites']);

        Route::get('/entries/pt', [WordController::class, 'search']);
        Route::get('/entries/pt/{word}', [WordController::class, 'show']);

        Route::post('/entries/pt/{word}/favorite', [FavoriteController::class, 'add']);
        Route::delete('/entries/pt/{word}/unfavorite', [FavoriteController::class, 'remove']); 