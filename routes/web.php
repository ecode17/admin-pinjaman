<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\PinjamanController;

Route::get('/pinjaman', [PinjamanController::class, 'index'])->name('pinjaman.index');
Route::get('/pinjaman/create', [PinjamanController::class, 'create'])->name('pinjaman.create');
Route::post('/pinjaman/store', [PinjamanController::class, 'store'])->name('pinjaman.store');
Route::get('/pinjaman/{id}/edit', [PinjamanController::class, 'edit'])->name('pinjaman.edit');
Route::put('/pinjaman/{id}', [PinjamanController::class, 'update'])->name('pinjaman.update');
Route::delete('/pinjaman/{id}', [PinjamanController::class, 'destroy'])->name('pinjaman.destroy');
