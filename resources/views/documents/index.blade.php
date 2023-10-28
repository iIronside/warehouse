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

                    <div class="col-1 mb-3">
                                <a href="{{route('documents.create')}}" type="button" class="btn btn-block btn-primary">Create</a>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Products</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>Created at</th>
                                            <th>Type</th>
                                            <th>Approved at</th>
                                            <th colspan="2" class="text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($documents as $document)
                                            <tr>
                                                <td>{{$document->created_at}}</td>
                                                <td>{{\App\Models\Document::typeList()[$document->type]}}</td>
                                                <td>{{$document->approved_at}}</td>
                                                <td><a href="{{route('documents.show', $document->id)}}" type="button" class="btn btn-block btn-primary">Show</a></td>

                                                @if (!$document->approved_at)
                                                    <td><a href="{{route('documents.approve', $document->id)}}" type="button" class="btn btn-block btn-primary">Approve</a></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
