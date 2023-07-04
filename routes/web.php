<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PhotographyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/Photographies/add', function () {
        return view('Photographies.formadd');
    })->name('Photographies.create');

    Route::match(['get', 'put'], '/Photographies/{idnumber}', [PhotographyController::class, 'update'])->name('Photographies.update');

    Route::resource('Photographies', PhotographyController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
