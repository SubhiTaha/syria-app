<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

Route::get('/cities', [CityController::class, 'index']);

Route::get('/cities/create', [CityController::class, 'create']);

Route::get('/cities/about', [CityController::class, 'about']);

Route::post('/cities', [CityController::class, 'store']);

Route::get('/cities/{id}', [CityController::class, 'show']);

Route::get('/cities/{id}/edit', [CityController::class, 'edit']);

Route::patch('/cities/{id}', [CityController::class, 'update'])->name('cities.update');

Route::delete('/cities/{id}', [CityController::class, 'destroy'])->name('cities.destroy');
