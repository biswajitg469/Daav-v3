<x-app-layout>
    <x-slot name="title">
        <h1 style="margin: 35px; font-size: 30px;">Manage User</h1>
        <div id="response" class="alert alert-success " style="display:none; width: auto;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <div class="message"></div>
        </div>

        <div class="container mt-5" style="width:auto;">
            <!-- DataTable Panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>User List</h3>

                    <a href="{{ route('products_download') }}" class="btn btn-info btn-sm" title="Download PDF">
                        <i class="fa fa-download" aria-hidden="true"></i>
                        <span class="sr-only">Download PDF</span>
                    </a>
                </div>
                <div class="panel-body">

                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Error Message -->
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <!-- DataTable -->
                    <div class="box box-warning">
                        <div class="box-body">
                            <div class="container-fluid">
                                <div class="table">
                                    <table id="userTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Phone No.</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $product->id }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->description }}</td>
                                                    <td>{{ number_format($product->price, 2) }}</td>
                                                    <td>
                                                        <button class="btn btn-warning btn-sm">
                                                            <a href="{{ route('product_edit', $product->id) }}"
                                                                style="color: white; text-decoration: none;">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                        </button>

                                                        <button class="btn btn-danger btn-sm">
                                                            <a href="{{ route('product_delete', $product->id) }}"
                                                                style="color: white; text-decoration: none;"><i
                                                                    class="fa fa-trash"></i>
                                                            </a></button>

                                                    </td>
                                                </tr>
                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </x-slot>
</x-app-layout>
