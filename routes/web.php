<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesSystemController;
use Inertia\Inertia;
use App\Http\Controllers\RoomSysController;
use App\Http\Controllers\RegistrationSystemController;

//registration
Route::get('/registration', [RegistrationSystemController::class, 'index'])
    ->name('registration.index');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//Room
Route::get('/roomsys', [RoomSysController::class, 'index']);

Route::get('/sales', [SalesSystemController::class, 'index'])
    ->name('sales.index');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Add your authenticated routes here
});
Route::middleware(['auth', 'verified'])->group(function () {
    // Add your authenticated routes here
    Route::get('/profile', [ProfileController::class, 'show'])
        ->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
});

require __DIR__.'/auth.php';
