<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class CustomerOrdersController extends Controller
{
    public function index()
    {
        return view('order.index',[
            'orders' => auth()->user()->orders
        ]);

    }

    /**
     * @param StoreOrderRequest $request
     * @return Application|Factory|View
     */
    public function store(StoreOrderRequest $request)
    {
        DB::beginTransaction();

       $order = (new Order())->storeNewOrder($request);

        DB::commit();

        return view('order.show',[
            'order' => $order,
        ]);
    }

    public function show(Order $order)
    {
        return view('order.show',[
            'order' => $order,
        ]);
    }

    /**
     * @param Order $order
     * @param UpdateOrderRequest $request
     * @return Application|Factory|View
     */
    public function update(Order $order,UpdateOrderRequest $request)
    {
        DB::beginTransaction();

        $order->updateOrder($request);

        DB::commit();

        return view('order.show',[
            'order' => $order,
        ]);
    }

    /**
     * @param Order $order
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Order $order): RedirectResponse
    {
        Product::find($order->product_id)->addInventory($order->quantity);

        $order->delete();

        return Redirect::back();
    }
}
