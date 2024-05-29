<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Members\UploadMembersController;
use App\Http\Controllers\TrainingPlans\TrainingPlanController;
use App\Http\Controllers\TrainingPlans\TrainingPlanSubscriptionController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [AuthenticatedSessionController::class, 'create'])->name('register');
    Route::post('/register', [AuthenticatedSessionController::class, 'store']);
    Route::get('/login', [AuthenticatedSessionController::class, 'session'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'login']);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard/Dashboard');
})->middleware(['auth'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::resources([
        'training-plans' => TrainingPlanController::class,
        'upload-members' => UploadMembersController::class
    ]);

    Route::resource('my-training-plans', TrainingPlanSubscriptionController::class)->only('index', 'store', 'destroy');
    Route::post('upload-members/insert', [UploadMembersController::class, 'storeUpdate'])->name('upload-members.insert');

});
