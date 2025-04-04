<?php

use App\Http\Controllers\ArtistasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/artistas', [ArtistasController::class, 'index'])->name('artistas.index');
Route::put('/artistas/{id}/toggle-status', [ArtistasController::class, 'toggleStatus'])->name('artistas.toggleStatus');
Route::get('/artistas/active', [ArtistasController::class, 'active'])->name('artistas.active');


Route::get('/artistas/crear', [ArtistasController::class, 'create'])->name('artistas.create');
Route::post('/artistas', [ArtistasController::class, 'store'])->name('artistas.store');


require __DIR__.'/auth.php';
