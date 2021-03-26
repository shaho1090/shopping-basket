<?php

use App\Http\Controllers\Admin\ProductsController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin'], function(){
    Route::get('/product-create', [ProductsController::class, 'create'])
        ->name('admin.product.create')
        ->middleware('auth');

    Route::post('/product-store', [ProductsController::class, 'store'])
        ->name('admin.product.store')
        ->middleware('auth');

    Route::get('/product-list', [ProductsController::class, 'index'])
        ->name('admin.product.index')
        ->middleware('auth');

    Route::delete('/product-delete/{product}', [ProductsController::class, 'destroy'])
        ->name('admin.product.destroy')
        ->middleware('auth');
});
