<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserManagementController;
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
    Route::get('/fetch-designs', [DesignController::class, 'fetchDesign'])->name('fetch-design');
});

// Order routes
Route::middleware('auth')->group(function () {
    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::post('order_store', action: [OrderController::class, 'store'])->name('order_store');
    Route::get('/fetch-customers', [CustomerController::class, 'fetchCustomers'])->name('fetch-customers');
    Route::get('/fetch-products', [ProductController::class, 'fetchProduct'])->name('fetch-products');
    Route::get('/fetch-designs', [DesignController::class, 'fetchDesign'])->name('fetch-design');


    // Add other OrderController routes as needed
});

// Bill routes
Route::middleware('auth')->group(function () {
    Route::get('/bill', [BillController::class, 'index'])->name('bill');
    // Add other BillController routes as needed
});

// Customer routes
Route::middleware('auth')->group(function () {
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
    Route::post('/customer_store', [CustomerController::class, 'store'])->name('customer_store');
    Route::get('/customer_manage', [CustomerController::class, 'manage'])->name('customer_manage');
    Route::get('/customer_edit/{id}', [CustomerController::class, 'edit'])->name('customer_edit');
    Route::put('/customer_update/{id}', [CustomerController::class, 'update'])->name('customer_update');
    Route::get('/customer_delete/{id}', [CustomerController::class, 'destroy'])->name('customer_delete');
    Route::get('/customers_download', [CustomerController::class, 'downloadPDF'])->name('customers_download');
    Route::get('/fetch-customers', [CustomerController::class, 'fetchCustomers'])->name('fetch.customers');

});
// User routes
Route::middleware('auth')->group(function () {
    Route::get('/useradd', [UserManagementController::class, 'index'])->name('useradd');
    Route::get('/userlist', [UserManagementController::class, 'usermanage'])->name('userlist');

});
