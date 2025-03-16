<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrdersListController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Customer\CartListController;
use App\Http\Controllers\customer\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controller::class,'index']);
Route::get('/dashboard', [Controller::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category', [CategoryController::class, 'store'])->name('category.store');
    Route::patch('category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('category/{id}', [CategoryController::class, 'delete'])->name('category.delete');


    Route::get('product', [productController::class, 'index'])->name('product.index');
    Route::post('product', [productController::class, 'store'])->name('product.store');
    Route::get('product/create', [productController::class, 'create'])->name('product.create');
    Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::patch('product/{id}', [productController::class, 'update'])->name('product.update');
    Route::delete('product/{id}', [productController::class, 'delete'])->name('product.delete');


    Route::get('orders-list', [OrdersListController::class, 'index'])->name('ordersList.index');
    Route::post('orders-list', [OrdersListController::class, 'store'])->name('ordersList.store');
    Route::get('orders-list/create', [OrdersListController::class, 'create'])->name('ordersList.create');
    Route::get('orders-list/edit/{id}', [OrdersListController::class, 'edit'])->name('ordersList.edit');
    Route::patch('orders-list/{id}', [OrdersListController::class, 'update'])->name('ordersList.update');
    Route::delete('orders-list/{id}', [OrdersListController::class, 'delete'])->name('ordersList.delete');

});


Route::middleware('auth')->prefix('customer')->group(function () {
    Route::get('cart-list', [CartListController::class, 'index'])->name('cartList.index');
    Route::post('cart-list', [CartListController::class, 'store'])->name('cartList.store');
    Route::delete('cart-list/{id}', [CartListController::class, 'delete'])->name('cartList.delete');


    Route::get('order', [OrderController::class, 'index'])->name('order.index');
    Route::post('order', [OrderController::class, 'store'])->name('order.store');

});

require __DIR__.'/auth.php';
