<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h4>Create product</h4>

                    <form action="{{route('products.store')}}" method="POST" class="w-25">
                        @csrf
                        <div class="form-group">
                            <label>title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title">
                            <label>article</label>
                            <input type="text" name="article" class="form-control" placeholder="Article">
                            <label>quantity</label>
                            <input type="number" name="quantity" class="form-control" placeholder="quantity">
                            <label>price</label>
                            <input type="number" name="price" class="form-control" placeholder="price">
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary" value="Add">
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
