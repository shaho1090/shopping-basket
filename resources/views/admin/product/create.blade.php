<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Product') }}
        </h2>
    </x-slot>

    <div class="max-h-screen flex flex-col sm:justify-center items-center pt-2 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-2 px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- product Name -->
                <div>
                    <x-label for="name" :value="__('Product Name')"/>

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                             :value="old('name')" required autofocus/>
                </div>

                <!-- Product Brand -->
                <div class="mt-4">
                    <x-label for="brand" :value="__('Brand')"/>

                    <x-input id="brand" class="block mt-1 w-full" type="text" name="brand"
                             :value="old('brand')" required/>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="inventory" :value="__('Initial Inventory')"/>

                    <x-input id="inventory" class="block mt-1 w-full"
                             type="number"
                             name="inventory"/>
                </div>

                <!-- Product type -->
{{--                <div class="mt-4">--}}
{{--                    <x-label for="product_type" :value="__('Confirm Password')"/>--}}

{{--                    <x-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                             type="password"--}}
{{--                             name="password_confirmation" required/>--}}
{{--                </div>--}}

                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <h2 class="card-header w-100 m-1 text-center">Upload Image</h2>
                    </div>
                    <div class="row justify-content-center">
                        {{-- enctype attribute is important if your form contains file upload --}}
                        {{-- Please check https://www.w3schools.com/tags/att_form_enctype.asp for further info --}}
                            <div class="form-group">
                                <x-label for="image">Choose Image</x-label>
                                <x-input id="image" type="file" name="image"/>
                            </div>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Store') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
