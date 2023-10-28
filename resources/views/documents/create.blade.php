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

                    <form id="form" action="{{route('documents.store')}}" method="POST" class="w-25">
                        @csrf
                        <div class="form-group">

                            <label for="category">Document type:</label>
                            <select class="form-control" id="category" name="type" required style="color:blue;">
                                <option value="">Choice type</option>
                                @foreach ($types as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>


                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div id="products" class="product" style="color:red; ">
                            <label for="article">Products:</label>
                            <select name="article[]" id="article">
                                @foreach ($products as $product)
                                    <option value="{{ $product->article}}">{{ $product->article }}</option>
                                @endforeach
                            </select>

                            <label>quantity</label>
                            <input type="number" name="quantity[]" class="form-control" placeholder="quantity">
                        </div>

                        <button type="button" id="addProduct">Add Product</button>
                        <button type="button" id="removeProduct">Remove Product</button>




                        <input type="submit" class="btn btn-primary" value="Add">
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.getElementById('addProduct').addEventListener('click', function() {
        let product = document.querySelector('.product').cloneNode(true);
        var form = document.getElementById('form');

        console.log(product);
        form.insertBefore(product, document.querySelector('#addProduct'));
    });

    document.getElementById('removeProduct').addEventListener('click', function() {
        let product = document.querySelector('.product');
        var form = document.getElementById('form');

        form.removeChild(product);
    });
</script>
