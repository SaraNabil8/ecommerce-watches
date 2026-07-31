<?php

use App\Http\Controllers\Admin\CategoryController;
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


//Categories 
Route::get('/categories/index', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


//ADMIN   EDITOR   USER 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [WatchController::class, 'home'])->name('home');
Route::get('/categories', [WatchController::class, 'categories'])->name('categories');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('watches', WatchController::class);
      //categories a ajouter plus tard 
});
//ADMIN 
Route::middleware('admin')->group(function () {
 
    Route::resource('watches', WatchController::class);
    //categories a ajouter plus tard 
    Route::get('/admin/dashboard', function () {
    return 'Hi Administrator';
})->name('admin_dashboard');
});

Route::middleware('editor')->group(function () {
 
    Route::get('/editor/dashboard', function () {
    return 'Hi Editor';
})->name('editor_dashboard');
});


require __DIR__.'/auth.php';
