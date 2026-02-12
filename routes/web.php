<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminrController;
use App\Http\Controllers\AdminrorderController;

// Redirect root ke login
Route::get('/', function () {
    return redirect('/login');
});

// Auth
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'log_out'])->name('logout');

// Admin Dashboard
Route::get('/admin/dashboard', [AdminrController::class, 'dashboard'])
    ->middleware('auth')
    ->name('admin.dashboard');
    Route::resource('admin/products', ProductController::class);


// Orders
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/orders', [AdminrorderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{id}', [AdminrorderController::class, 'show'])->name('admin.orders.show');
    Route::put('/orders/{id}', [AdminrorderController::class, 'update'])->name('admin.orders.update');

    Route::get('/reports/sales', [AdminrController::class, 'salesReport'])->name('admin.sales');
});

// Products
Route::resource('products', ProductController::class);
// User Dashboard
Route::get('/user/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])
    ->middleware('auth')
    ->name('user.dashboard');