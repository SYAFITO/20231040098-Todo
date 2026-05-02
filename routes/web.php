<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | ABOUT
    |--------------------------------------------------------------------------
    */
    Route::get('/about', [AboutController::class, 'index'])->name('about');

    /*
    |--------------------------------------------------------------------------
    | PRODUCT
    |--------------------------------------------------------------------------
    */
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    /*
    |--------------------------------------------------------------------------
    | EXPORT PRODUCT (ADMIN ONLY)
    |--------------------------------------------------------------------------
    */
    Route::get('/product/export', [ProductController::class, 'export'])
        ->middleware('can:admin-only')
        ->name('product.export');

    /*
    |--------------------------------------------------------------------------
    | CATEGORY (ADMIN ONLY)
    |--------------------------------------------------------------------------
    */
    Route::middleware('can:admin-only')->group(function () {

        Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

        Route::post('/category', [CategoryController::class, 'store'])->name('category.store');

        Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');

        Route::put('/category/update/{category}', [CategoryController::class, 'update'])->name('category.update');

        Route::delete('/category/delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');
    });
});

require __DIR__.'/auth.php';