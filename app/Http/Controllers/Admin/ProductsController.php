<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::all();

        return view('admin.product.index',[
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        (new Product())->storeNewProductWithImage($request);

        Session::flash('success', "Success!");
        return Redirect::back();
    }

    /**
     * @param Product $product
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return Redirect::back();
    }

}

