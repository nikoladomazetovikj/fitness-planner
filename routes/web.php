<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::get('/register', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create']);
Route::post('/register', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
