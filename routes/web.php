<?php

use App\Http\Controllers\BoxController;
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
    
    Route::get('/box', [BoxController::class, 'index'])->name('box.index');
    Route::get('/box/create', [BoxController::class, 'create'])->name('box.create');
    Route::get('/box/{id}', [BoxController::class, 'show'])->name('box.show');
    Route::post('/box', [BoxController::class, 'store'])->name('box.store');
    Route::get('/box/{id}/edit', [BoxController::class, 'edit'])->name('box.edit');
    Route::put('/box/{id}', [BoxController::class, 'update'])->name('box.update');
    Route::delete('/box/{id}', [BoxController::class, 'destroy'])->name('box.destroy');
});

require __DIR__.'/auth.php';
