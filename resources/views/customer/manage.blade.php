<x-app-layout>
    <x-slot name="title">
        <h1 style="margin: 35px; font-size: 30px;">Manage Design List</h1>
    </x-slot>
    <x-slot name="content">
        <div class="container mt-5" style="width:auto;">
            <!-- DataTable Panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Manage Design</h3>
                    <a href="{{ route('designs_download') }}" class="btn btn-info btn-sm" title="Download PDF">
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
                                    <table id="designTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Design ID.</th>
                                                <th>Design Name</th>
                                                <th>Design Description</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($designs as $design)
                                                    <tr>
                                                        <td>{{ $design->id }}</td>
                                                        <td>{{ $design->name }}</td>
                                                        <td>{{ $design->description }}</td>
                                                        <td>
                                                            <button class="btn btn-warning btn-sm">
                                                                <a href="{{ route('design_edit', $design->id) }}"
                                                                    style="color: white; text-decoration: none;">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                            </button>

                                                            <button class="btn btn-danger btn-sm">
                                                                <a href="{{ route('design_delete', $design->id) }}"
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




