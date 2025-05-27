<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CepController;

Route::get('/ceps', [CepController::class, 'index'])->name('ceps.index');
Route::get('/ceps/create', [CepController::class, 'create'])->name('ceps.create');
Route::post('/ceps', [CepController::class, 'store'])->name('ceps.store');
Route::get('/ceps', [Cepcontroller::class, 'index'])->name('ceps.index');