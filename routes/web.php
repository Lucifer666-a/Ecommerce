<?php

use App\Http\Controllers\ProductController;

Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');

Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');

Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');

Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');

Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

Route::get('/admin/products', [ProductController::class, 'adminIndex'])->name('admin.products.index');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::redirect('/', '/products');