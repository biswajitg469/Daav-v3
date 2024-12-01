<x-app-layout>
    <x-slot name="title">
        <h1>User Create </h1>
        <div id="response" class="alert alert-success " style="display:none; width: auto;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <div class="message"></div>
        </div>

        <div class="row">
            <div class="container mt-5" style="width:auto;margin: 30px;">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>User Information</h4>
                        </div>
                        <div class="panel-body form-group form-group-sm">
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if(Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif

                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror


                            <form method="post" id="add_user" action={{route('user_store')}} method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="action" value="add_user">

                                <div class="row">
                                    <div class="col-xs-4">
                                        <input type="text" class="form-control margin-bottom required" name="name"
                                            placeholder="Name">
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="text" class="form-control margin-bottom required" name="username"
                                            placeholder="Enter username">
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="text" class="form-control margin-bottom required" name="email"
                                            placeholder="Enter user's email address">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-4">
                                        <input type="number" class="form-control" name="phone"
                                            placeholder="Enter user's phone number" maxlength="10" minlength="10">
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="password" class="form-control required" name="password"
                                            id="password" placeholder="Enter user's password">
                                    </div>
                                    <div class="col-xs-4">
                                        <select name="role" class="form-control">
                                            <option value="">Select Role</option>
                                            @foreach(Config::get('constants.roles') as $roles => $val)
                                                <option value="{{ $roles}}">{{$val}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 margin-top btn-group">
                                        <input type="submit" id="action_add_user" class="btn btn-success float-right"
                                            value="Add user" data-loading-text="Adding...">
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