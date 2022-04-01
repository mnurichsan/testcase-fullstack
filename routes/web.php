<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[App\Http\Controllers\FrontendController::class,'index'])->name('front');

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('category')->group(function () {
        Route::get('',[App\Http\Controllers\CategoryController::class,'index'])->name('category.index');
        Route::get('create',[App\Http\Controllers\CategoryController::class,'create'])->name('category.create');
        Route::post('store',[App\Http\Controllers\CategoryController::class,'store'])->name('category.store');
        Route::get('{id}/edit',[App\Http\Controllers\CategoryController::class,'edit'])->name('category.edit');
        Route::put('{id}/update',[App\Http\Controllers\CategoryController::class,'update'])->name('category.update');
        Route::post('delete',[App\Http\Controllers\CategoryController::class,'destroy'])->name('category.destory');
    });

    Route::prefix('product')->group(function () {
        Route::get('',[App\Http\Controllers\ProductController::class,'index'])->name('product.index');
        Route::get('create',[App\Http\Controllers\ProductController::class,'create'])->name('product.create');
        Route::post('store',[App\Http\Controllers\ProductController::class,'store'])->name('product.store');
        Route::get('{id}/edit',[App\Http\Controllers\ProductController::class,'edit'])->name('product.edit');
        Route::put('{id}/update',[App\Http\Controllers\ProductController::class,'update'])->name('product.update');
        Route::post('delete',[App\Http\Controllers\ProductController::class,'destroy'])->name('product.destory');
    });
    
});


