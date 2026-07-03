<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChickenController;
use App\Http\Controllers\EggController;
use App\Http\Controllers\GardenController;
use App\Http\Controllers\GardenPlotController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\HarvestController;

Route::get('/', function () {
    return view('welcome');
});

//Chickens routes
Route::get('/chickens', [ChickenController::class, 'index'])->name('chickens.index');
Route::get('/chickens/create', [ChickenController::class, 'create'])->name('chickens.create');
Route::post('/chickens', [ChickenController::class, 'store'])->name('chickens.store');

//Egg routes
Route::get('/eggs', [EggController::class, 'index'])->name('eggs.index');
Route::get('/eggs/create', [EggController::class, 'create'])->name('eggs.create');
Route::post('/eggs', [EggController::class, 'store'])->name('eggs.store');

//Garden routes
Route::get('/gardens', [GardenController::class, 'index'])->name('gardens.index');
Route::get('/gardens/create', [GardenController::class, 'create'])->name('gardens.create');
Route::post('/gardens', [GardenController::class, 'store'])->name('gardens.store');

Route::get('/gardens/{garden}', [GardenController::class, 'show'])->name('gardens.show');
Route::get('/gardens/{garden}/add-plot', [GardenPlotController::class, 'create'])->name('garden_plots.create');
Route::post('/gardens/{garden}/add-plot', [GardenPlotController::class, 'store'])->name('garden_plots.store');

Route::get('/gardens/{garden}/{plot}', [GardenPlotController::class, 'show'])->name('garden_plots.show');
Route::get('/gardens/{garden}/{plot}/add-plant', [PlantController::class, 'create'])->name('plants.create');
Route::post('/gardens/{garden}/{plot}/add-plant', [PlantController::class, 'store'])->name('plants.store');

Route::get('/gardens/{garden}/{plot}/{plant}', [PlantController::class, 'show'])->name('plants.show');
Route::get('/gardens/{garden}/{plot}/{plant}/add-harvest', [HarvestController::class, 'create'])->name('harvests.create');
Route::post('/gardens/{garden}/{plot}/{plant}/add-harvest', [HarvestController::class, 'store'])->name('harvests.store');