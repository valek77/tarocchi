<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class, 'index']);

Route::get('/m3', [AppController::class, 'mazzo3Carte']);

Route::get('/m5', [AppController::class, 'mazzo5Carte']);

Route::get('/r3', [AppController::class, 'responso3Carte']);

Route::get('/r5', [AppController::class, 'responso5Carte']);


