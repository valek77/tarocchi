<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class, 'index']);

Route::get('/m3', [AppController::class, 'mazzo3Carte']);

Route::get('/m5', [AppController::class, 'mazzo5Carte']);


