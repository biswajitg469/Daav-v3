<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login'); // Fixed the view name
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Product routes
Route::middleware('auth')->group(function () {
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::post('/product_store', [ProductController::class, 'store'])->name('product_store');
    Route::get('/product_manage', [ProductController::class, 'manage'])->name('product_manage');
    Route::get('/product_edit/{id}', [ProductController::class, 'edit'])->name('product_edit');
    Route::put('/product_update/{id}', [ProductController::class, 'update'])->name('product_update');
    Route::get('/product_delete/{id}', [ProductController::class, 'destroy'])->name('product_delete');
    Route::get('/products_download', [ProductController::class, 'downloadPDF'])->name('products_download');
});

// Design routes
Route::middleware('auth')->group(function () {
    Route::get('/design', [DesignController::class, 'index'])->name('design');
    Route::post('/design_store', [DesignController::class, 'store'])->name('design_store');
    Route::get('/design_manage', [DesignController::class, 'manage'])->name('design_manage');
    Route::get('/design_edit/{id}', [DesignController::class, 'edit'])->name('design_edit');
    Route::put('/design_update/{id}', [DesignController::class, 'update'])->name('design_update');
    Route::get('/design_delete/{id}', [DesignController::class, 'destroy'])->name('design_delete');
    Route::get('/designs_download', [DesignController::class, 'downloadPDF'])->name('designs_download');
});
