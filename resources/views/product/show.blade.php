<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details')}}
        </h2>
    </x-slot>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="object-contain sm:justify-center items-center">

    </div>

    <div class="max-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <img src="{{ $image->url }}" alt="product image" width="300" height="400">
        <div class="w-full sm:max-w-2xl mt-4 px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form action="{{route('order.store')}}" method="post">
                @csrf
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
                            {{ $product->name }}
                        </td>
                        <td>
                            {{ $product->brand }}
                        </td>
                        <td>
                            {{ $product->inventory }}
                        </td>
                        <td>
                            <x-input id="order_quantity" class="w-2/3"
                                     type="number"
                                     value="1"
                                     min="1"
                                     name="order_quantity" required/>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-outline-danger"
                                    name="product_id"
                                    value="{{$product->id}}">Order</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</x-app-layout>
