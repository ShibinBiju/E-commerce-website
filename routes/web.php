<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Controller;
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

});

require __DIR__.'/auth.php';
