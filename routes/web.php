<?php

use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store'])
    ->middleware(['auth']);

require __DIR__ . '/auth.php';
