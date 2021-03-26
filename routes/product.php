<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth'], function(){
//    Route::get('/product-create', [ProductsController::class, 'create'])
//        ->name('product.create');

//    Route::post('/product-store', [ProductsController::class, 'store'])
//        ->name('product.store');

    Route::get('/product-list', [ProductsController::class, 'index'])
        ->name('product.index');

    Route::get('/product-show/{product}', [ProductsController::class, 'show'])
        ->name('product.show');

//    Route::delete('/product-delete/{product}', [ProductsController::class, 'destroy'])
//        ->name('product.destroy');
});
