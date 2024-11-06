<x-app-layout>
    <x-slot name="title">
        <h1>Add Desing</h1>
        <div id="response" class="alert alert-success " style="display:none; width: auto;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <div class="message"></div>
        </div>
        {{-- <x-slot name="content"> --}}
        <div class="row">
            <div class="container mt-5" style="width:auto; margin: 30px;">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Design Information</h4>
                        </div>
                        <div class="panel-body form-group form-group-sm">
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
                            <!-- HTML Form -->
                            <form method="POST" action="{{ route('desing_store') }}" id="add_desing">
                                {{ csrf_field() }}

                                <div class="row"style="padding-left:20%">
                                    <div class="col-xs-4">
                                        <!-- Design Name Input -->
                                        <input type="text" class="form-control" id="design_name" name="design_name"
                                            placeholder="Enter Design Name" required>
                                    </div>
                                    <div class="col-xs-4">
                                        <!-- Design Description Input -->
                                        <input type="text" class="form-control" id="design_desc" name="design_desc"
                                            placeholder="Enter Design Description" required>
                                    </div>

                                </div>

                                <div class="row ">
                                    <div class="col-xs-10 text-right">
                                        <!-- Add Design Button -->
                                        <button id="action_add_design" class="btn btn-success"
                                            data-loading-text="Adding...">
                                            Add Design
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-slot>
</x-app-layout>
