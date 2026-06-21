<?php

use App\Http\Controllers\ProductController;

Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');

Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/{slug}', [ProductContlroller::class, 'show'])->name('products.show');