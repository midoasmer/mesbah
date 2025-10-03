<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserRequestController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserRequestController as AdminUserRequestController;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/product/{product}', [HomeController::class, 'product'])->name('product');
Route::get('/order/{product}', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/request', [UserRequestController::class, 'create'])->name('user-request.create');
Route::post('/request', [UserRequestController::class, 'store'])->name('user-request.store');

// Admin Routes
Route::prefix('admin')->group(function () {
    // Auth Routes
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    
    // Protected Admin Routes
    Route::middleware(['auth', 'web'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        
        // Categories
        Route::resource('categories', CategoryController::class, ['as' => 'admin']);
        
        // Products
        Route::resource('products', ProductController::class, ['as' => 'admin']);
        
        // Orders
        Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
        Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
        Route::post('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.update-status');
        Route::delete('/orders/{order}', [AdminOrderController::class, 'destroy'])->name('admin.orders.destroy');
        
        // User Requests
        Route::get('/user-requests', [AdminUserRequestController::class, 'index'])->name('admin.user-requests.index');
        Route::get('/user-requests/{userRequest}', [AdminUserRequestController::class, 'show'])->name('admin.user-requests.show');
        Route::post('/user-requests/{userRequest}/status', [AdminUserRequestController::class, 'updateStatus'])->name('admin.user-requests.update-status');
        Route::delete('/user-requests/{userRequest}', [AdminUserRequestController::class, 'destroy'])->name('admin.user-requests.destroy');
        
        // Profile Management
        Route::get('/profile', [ProfileController::class, 'show'])->name('admin.profile');
        Route::post('/profile/update-email', [ProfileController::class, 'updateEmail'])->name('admin.profile.update-email');
        Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('admin.profile.update-password');
    });
});
