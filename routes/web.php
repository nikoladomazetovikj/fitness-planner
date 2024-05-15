<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::get('/register', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create']);
Route::post('/register', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
Route::get('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'session']);
Route::post('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'login']);

Route::get('/dashboard', function () {
    return Inertia::render('Welcome');
})->middleware(['auth'])->name('home');
