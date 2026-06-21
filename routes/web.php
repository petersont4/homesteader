<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChickenController;
use App\Http\Controllers\EggController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chickens', [ChickenController::class, 'index'])->name('chickens.index');
Route::get('/chickens/create', [ChickenController::class, 'create'])->name('chickens.create');
Route::post('/chickens', [ChickenController::class, 'store'])->name('chickens.store');

Route::get('/eggs', [EggController::class, 'index'])->name('eggs.index');
Route::get('/eggs/create', [EggController::class, 'create'])->name('eggs.create');
Route::post('/eggs', [EggController::class, 'store'])->name('eggs.store');
