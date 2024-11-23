<x-app-layout>
    <x-slot name="title">
        <h1 style="margin: 35px; font-size: 30px;">Manage customer List</h1>
    </x-slot>
    <x-slot name="content">
        <div class="container mt-5" style="width:auto;">
            <!-- DataTable Panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Manage customer</h3>
                    <a href="{{ route('customers_download') }}" class="btn btn-info btn-sm" title="Download PDF">
                        <i class="fa fa-download" aria-hidden="true"></i>
                        <span class="sr-only">Download PDF</span>
                    </a>
                </div>
                <div class="panel-body">
                    <!-- DataTable -->
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Error Message -->
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="box box-warning">
                        <div class="box-body">
                            <div class="container-fluid">
                                <div class="table">
                                    <table id="customerTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Customer ID</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Region</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($customers as $customer)
                                                <tr>
                                                    <td>{{ $customer->id }}</td>
                                                    <td>{{ $customer->name }}</td>
                                                    <td>{{ $customer->phone }}</td>
                                                    <td>{{ $customer->address_1 }} <br>{{ $customer->address_2 }}<br>
                                                        <b>Town-</b>
                                                        {{$customer->town}}<br>
                                                        <b>Postcode-</b> {{$customer->postcode}}<br> <b>State-</b>
                                                        {{$customer->state}}
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>{{ $customer->region }}</td>
                                                    <td>
                                                        <button class="btn btn-warning btn-sm">
                                                            <a href="{{ route('customer_edit', $customer->id) }}"
                                                                style="color: white; text-decoration: none;">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                        </button>

                                                        <button class="btn btn-danger btn-sm">
                                                            <a href="{{ route('customer_delete', $customer->id) }}"
                                                                style="color: white; text-decoration: none;"><i
                                                                    class="fa fa-trash"></i>
                                                            </a></button>

                                                    </td>
                                                </tr>
                                            @endforeach
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