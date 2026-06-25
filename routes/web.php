<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;


 // -----------------------------Auth Routes-----------------------------//
Route::get('/login', [AuthController::class, 'showlogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

 // -----------------------------Admin Routes-----------------------------//
Route::middleware(['admin'])->group(function () {

  Route::get('/admin', [ProductController::class, 'adminDashboard'])->name('admin.index');

  Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');

  Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');

  Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');

  Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');

  Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

  Route::get('/admin/products', [ProductController::class, 'adminIndex'])->name('admin.products.index');

  Route::get('/admin/orders', [ProductController::class, 'adminOrders'])->name('admin.orders.index');

});

// -----------------------------User Routes-----------------------------//

Route::get('/', [ProductController::class, 'home'])->name('home');

Route::get('/shop', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/cart', [ProductController::class, 'viewCart'])->name('cart.view');

Route::post('/cart/add/{id}', [ProductController::class, 'addToCart'])->name('cart.add');

Route::post('/cart/update/{id}', [ProductController::class, 'updateCart'])->name('cart.update');

Route::delete('/cart/remove/{id}', [ProductController::class, 'removeFromCart'])->name('cart.remove');

Route::post('/checkout', [ProductController::class, 'checkout'])->name('cart.checkout');

Route::get('/checkout', [ProductController::class, 'checkoutView'])->name('cart.checkout.view');

Route::post('/checkout/process', [ProductController::class, 'processCheckout'])->name('cart.checkout.process');

Route::post('/products/buy-now/{id}', [ProductController::class, 'buyNow'])->name('products.buy_now');
