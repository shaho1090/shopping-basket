<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Details')}}
        </h2>
    </x-slot>

    <div class="object-contain sm:justify-center items-center">

    </div>

    <div class="max-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <img src="{{ $order->product->images()->first()->url }}" alt="product image" width="300" height="400">
        <div class="w-full sm:max-w-2xl mt-4 px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form action="{{route('order.update', $order->id)}}" method="post">
                @csrf
                @method('PATCH')
                <table class="table-auto w-full justify-center items-center text-center">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Brand</th>
                        <th>Inventory</th>
                        <th>order quantity</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            {{ $order->product->name }}
                        </td>
                        <td>
                            {{ $order->product->brand }}
                        </td>
                        <td>
                            {{  $order->product->inventory }}
                        </td>
                        <td>
                            <x-input id="order_quantity" class="w-2/3"
                                     type="number"
                                     value="{{ $order->quantity }}"
                                     min="1"
                                     name="order_quantity" required/>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-outline-danger"
                                    name="product_id"
                                    value="{{$order->id}}">Update</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</x-app-layout>
