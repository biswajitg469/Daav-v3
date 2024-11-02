<x-app-layout>
    <x-slot name="title">
        <h1>Add Product</h1>
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
                                <h4>Product Information</h4>
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
                                <form method="POST" action="{{ route('product_store') }}" id="add_product">
                                    {{ csrf_field() }}
                           
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label for="orderDate" class="form-label">Product Name</label>
                                            <!-- Product Name Input -->
                                            <input type="text" class="form-control" name="product_name"
                                                placeholder="Enter Product Name" required>
                                        </div>

                                        <div class="col-xs-4">
                                            <label for="orderDate" class="form-label">Product Description</label>
                                            <!-- Product Description Input -->
                                            <input type="text" class="form-control" name="product_desc"
                                                placeholder="Enter Product Description" required>
                                        </div>

                                        <div class="col-xs-4">
                                            <label for="orderDate" class="form-label">Amount</label>
                                            <div class="input-group">
                                                <!-- Currency Symbol (use Blade to output the value) -->
                                                <input type="number" name="product_price" class="form-control"
                                                    placeholder="0.00" required aria-describedby="sizing-addon1">
                                            </div>
                                        </div>
                                        {{-- <div class="row mt-6"> --}}
                                            <div class="col-xs-10">
                                                <!-- Add Product Button -->
                                                <input type="submit" id="action_add_product"
                                                    class="btn btn-success float-right" value="Add Product"
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