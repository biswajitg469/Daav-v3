<x-app-layout>
    <x-slot name="title">
        <h1>Add Order</h1>
        <div id="response" class="alert alert-success " style="display:none; width: auto;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <div class="message"></div>
        </div>
        {{-- <x-slot name="content"> --}}
            <div class="row">
                <div class="container mt-5" style="width:auto;margin: 30px;">
                    <div class="col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Order Information</h4>
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
                                <form method="POST" action="" id="add_order">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label for="orderDate" class="form-label">Order Date</label>
                                            <input type="date" class="form-control" name="order_date"
                                                placeholder="Enter Order Date" required>
                                        </div>

                                        <div class="col-xs-4">
                                            <label for="cuttingDate" class="form-label">Cutting Date</label>
                                            <input type="date" class="form-control" name="cutting_date"
                                                placeholder="Enter Cutting Date" required>
                                        </div>

                                        <div class="col-xs-4">
                                            <label for="deliveryDate" class="form-label">Delivery Date</label>
                                            <input type="date" name="delivery_date" class="form-control"
                                                placeholder="Enter Delivery Date" required>
                                        </div>
                                    </div>

                                    <div class="row mt-5">
                                        <div class="col text-center" style="padding-top: 40px">
                                            <!-- Centered Add Order Button -->
                                            <input type="submit" id="action_add_order"
                                                class="btn btn-success" value="Add Order"
                                                data-loading-text="Adding...">
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
