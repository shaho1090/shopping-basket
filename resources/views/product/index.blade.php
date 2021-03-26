<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products List') }}
        </h2>
    </x-slot>

    <div class="max-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-2xl mt-4 px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <table class="table-auto w-full justify-center text-center">
                <thead class="border ">
                <tr>
                    <th>Product Name</th>
                    <th>Brand</th>
                    <th>Inventory</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr class="border">
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
                            <a href="{{ route('product.show', $product->id) }}">
                                {{ __('Show') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{--                <script src="{{ asset('js/myFunctions.js') }}"></script>--}}

    </div>
</x-app-layout>
