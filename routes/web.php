<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login'); // Fixed the view name
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

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


//Product
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::post('/product_store', [ProductController::class, 'store'])->name('product_store');
Route::get('/product_manage', [ProductController::class, 'manage'])->name('product_manage');
Route::get('/product_edit/{id}', [ProductController::class, 'edit'])->name('product_edit');
Route::put('/product_update/{id}', [ProductController::class, 'update'])->name('product_update');
Route::get('/product_delete/{id}', [ProductController::class, 'destroy'])->name('product_delete');  