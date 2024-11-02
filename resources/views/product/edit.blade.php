<x-app-layout>
    <x-slot name="title">
        <h1>Edit Product</h1>
    </x-slot>

    <x-slot name="content">
        <div class="container mt-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Edit Product Information</h4>
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
                    <form method="POST" action="{{ route('product_update', $product->id) }}" id="edit_product">
                        @csrf
                        @method('PUT') <!-- Use PUT method for updates -->

                        <div class="row">
                            <div class="col-xs-4">
                                <label for="product_name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="product_name"
                                       value="{{ $product->name }}" required>
                            </div>

                            <div class="col-xs-4">
                                <label for="product_desc" class="form-label">Product Description</label>
                                <input type="text" class="form-control" name="product_desc"
                                       value="{{ $product->description }}" required>
                            </div>

                            <div class="col-xs-4">
                                <label for="product_price" class="form-label">Amount</label>
                                <input type="number" name="product_price" class="form-control"
                                       value="{{ number_format($product->price, 2) }}" required step="0.01" min="0">
                            </div>

                            <div class="col-xs-10">
                                <input type="submit" class="btn btn-success float-right" value="Update Product">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
