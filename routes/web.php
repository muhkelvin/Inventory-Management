<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\OrderController;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Order;


// Routes for Products with Model Binding
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show'); // Model Binding
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit'); // Model Binding
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update'); // Model Binding
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy'); // Model Binding

// Routes for Suppliers with Model Binding
Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
Route::get('/suppliers/{supplier}', [SupplierController::class, 'show'])->name('suppliers.show'); // Model Binding
Route::get('/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit'); // Model Binding
Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update'); // Model Binding
Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy'); // Model Binding

// Routes for Orders with Model Binding
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show'); // Model Binding
Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit'); // Model Binding
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update'); // Model Binding
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy'); // Model Binding
