<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order List') }}
        </h2>
    </x-slot>

    <div class="max-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-2xl mt-4 px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <table class="table-auto w-full justify-center text-center">
                <thead class="border ">
                <tr>
                    <th>Order Code</th>
                    <th>Product Name</th>
                    <th>Brand</th>
                    <th>Quantity</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr class="border">
                        <td>
                            {{ $order->code }}
                        </td>
                        <td>
                            {{ $order->product->name }}
                        </td>
                        <td>
                            {{ $order->product->brand }}
                        </td>
                        <td>
                            {{ $order->quantity }}
                        </td>
                        <td>
                            <form action="{{route('order.destroy',$order->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete /</button>
                                <a href="{{ route('order.show', $order->id) }}">
                                    {{ __('Show') }}
                                </a>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
