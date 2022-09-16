<?php

use App\Http\Livewire\Chirps;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('chirps', Chirps::class)->name('chirps');
});

require __DIR__ . '/auth.php';
