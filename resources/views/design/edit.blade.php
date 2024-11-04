<x-app-layout>
    <x-slot name="title">
        <h1>Edit Design</h1>
    </x-slot>

    <x-slot name="content">
        <div class="container mt-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Edit Design Information</h4>
                </div>
                <div class="panel-body form-group form-group-sm">

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

                    <!-- Blade Form -->
                    <form method="POST" action="{{ route('design_update', $design->id) }}" id="edit_design">
                        @csrf
                        @method('PUT') <!-- Use PUT method for updates -->

                        <div class="row">
                        <div class="col-xs-2">
                                <label for="design_name" class="form-label">Design ID.</label>
                                <input type="text" class="form-control" name="design_name"
                                       value="{{ $design->id }}" required readonly>
                            </div>
                            <div class="col-xs-4">
                                <label for="design_name" class="form-label">Design Name</label>
                                <input type="text" class="form-control" name="design_name"
                                       value="{{ $design->name }}" required>
                            </div>

                            <div class="col-xs-4">
                                <label for="design_desc" class="form-label">Design Description</label>
                                <input type="text" class="form-control" name="design_desc"
                                       value="{{ $design->description }}" required>
                            </div>
                            <div class="col-xs-10">
                                <input type="submit" class="btn btn-success float-right" value="Update design">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
