<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $products = Product::all();

        return view('product.index',[
            'products' => $products,
        ]);
    }

    /**
     * @param Product $product
     * @return Application|Factory|View
     */
    public function show(Product $product)
    {
        return view('product.show',[
            'product' => $product,
            'image' => $product->images()->first()
        ]);
    }
}
