<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Document') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h4>Document</h4>

                    <table class="table table-hover text-nowrap">
                        <tbody>
                        <tr>
                            <td>Created at</td>
                            <td>{{$document->created_at}}</td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>{{$document->type}}</td>
                        </tr>

                        <tr>
                            <td>Products</td>
                            <table>
                                @foreach($document->documentsProducts as $documentsProducts)
                                    <tr>
                                        <td>Title</td>
                                        <td>{{$documentsProducts->product->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>Article</td>
                                        <td>{{$documentsProducts->product_article}}</td>
                                    </tr>
                                    <tr>
                                        <td>Quantity</td>
                                        <td>{{$documentsProducts->quantity}}</td>
                                    </tr>
                                    <tr>
                                        <td>Remnants</td>
                                        <td>{{$documentsProducts->remnants}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
