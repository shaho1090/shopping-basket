<?php

use App\Http\Controllers\CustomerOrdersController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth'], function(){
//    Route::get('/product-create', [ProductsController::class, 'create'])
//        ->name('product.create');

    Route::post('/order-store', [CustomerOrdersController::class, 'store'])
        ->name('order.store');

    Route::get('/order-list', [CustomerOrdersController::class, 'index'])
        ->name('order.index');

    Route::get('/order-show/{order}', [CustomerOrdersController::class,'show'])
        ->name('order.show');

    Route::patch('/order-update/{order}', [CustomerOrdersController::class,'update'])
        ->name('order.update');

    Route::delete('/order-delete/{order}', [CustomerOrdersController::class, 'destroy'])
        ->name('order.destroy');
});
