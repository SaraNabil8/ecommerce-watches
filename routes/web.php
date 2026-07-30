<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WatchController;

Route::get('/watches', [WatchController::class, 'index'])->name('watches.index');
Route::get('/watches/create', [WatchController::class, 'create'])->name('watches.create');
Route::post('/watches', [WatchController::class, 'store'])->name('watches.store');
Route::get('/watches/{watch}', [WatchController::class, 'show'])->name('watches.show');
Route::get('/watches/{watch}/edit', [WatchController::class, 'edit'])->name('watches.edit');
Route::put('/watches/{watch}', [WatchController::class, 'update'])->name('watches.update');
Route::delete('/watches/{watch}', [WatchController::class, 'destroy'])->name('watches.destroy');





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

require __DIR__.'/auth.php';
