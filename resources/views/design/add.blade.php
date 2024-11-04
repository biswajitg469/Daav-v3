<x-app-layout>

    <x-slot name="title">
        <div class="content-header" style="padding: 40px 15px 36px 15px;">
            <h1>Add Design</h1>
            <div id="response" class="alert alert-success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert">×</a>
                <div class="message"></div>
            </div>
            <div class="container-fluid">

            </div>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="row">
            <div class="container mt-5" style="width:auto;margin: 30px;">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Design Information</h4>
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
                            <!-- HTML Form -->
                            <form method="POST" action="{{ route('design_store') }}" id="add_design">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xs-5">
                                        <input type="text" class="form-control" name="design_name"
                                            placeholder="Enter Design Name" required>
                                    </div>
                                    <div class="col-xs-5">
                                        <input type="text" class="form-control" name="design_desc"
                                            placeholder="Enter Design Description" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-xs-11">
                                        <input type="submit" id="action_add_design" class="btn btn-success float-right"
                                            value="Add Design">
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