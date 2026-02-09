<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminrController;
use App\Http\Controllers\AdminrorderController;



Route::get('/', function () {
    return redirect('/login');
});
route::post('/logout', [App\Http\Controllers\AuthController::class, 'log_out'])->name('logout');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
route::post('/products', [ProductController::class, 'store'])->name('products.store');
route::get('/admin/reports/sales', [App\Http\Controllers\AdminrController::class, 'salesReport'])->name('admin.sales');
route::get('/admin/orders', [App\Http\Controllers\AdminrorderController::class, 'index'])->name('admin.orders.index');
route::get('/admin/orders/{id}', [App\Http\Controllers\AdminrorderController::class, 'show'])->name('admin.orders.show');
route::put('/admin/orders/{id}', [App\Http\Controllers\AdminrorderController::class, 'update'])->name('admin.orders.update');

route::get('/admin/dashboard', [App\Http\Controllers\AdminrController::class, 'dashboard'])->name('admin.dashboard');
route::get('/user/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('user.dashboard');
