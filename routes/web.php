<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cepcontroller;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [Cepcontroller::class, 'index'])->name('ceps.index');
Route::get('/ceps/create', [Cepcontroller::class, 'create'])->name('ceps.create');
Route::get('/ceps', [Cepcontroller::class, 'store'])->name('ceps.store');
