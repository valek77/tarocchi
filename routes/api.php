<?php
use Illuminate\Support\Facades\Route;




use App\Http\Controllers\TarotController;

// routes/api.php

Route::post('/tarot/past', [TarotController::class, 'interpretPast']);
Route::post('/tarot/present', [TarotController::class, 'interpretPresent']);
Route::post('/tarot/future', [TarotController::class, 'interpretFuture']);
Route::post('/tarot/response', [TarotController::class, 'getResponse']);

