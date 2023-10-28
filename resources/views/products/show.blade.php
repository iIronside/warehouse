<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h4>Product</h4>

                    <table class="table table-hover text-nowrap">
                        <tbody>
                        <tr>
                            <td>Title</td>
                            <td>{{$product->title}}</td>
                        </tr>
                        <tr>
                            <td>Article</td>
                            <td>{{$product->article}}</td>
                        </tr>
                        <tr>
                            <td>Quantity</td>
                            <td>{{$product->quantity}}</td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>{{$product->price}}</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
