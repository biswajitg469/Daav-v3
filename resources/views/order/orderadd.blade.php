@php
    $SIZE_FORMAT = 'Sq. Ft.';
    $INVOICE_PREFIX = 'DAAV/ORD/'
@endphp
<x-app-layout>
    <x-slot name="title">
        <h1>Add Order Slip</h1>
        <div id="response" class="alert alert-success " style="display:none; width: auto;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <div class="message"></div>
        </div>
        <form method="post" id="create_order" role="form" action="{{route('order_store')}}">
            <input type="hidden" name="action" value="create_order">
            {{csrf_field()}}
            <div class="row">
                <div class="col-xs-4"></div>
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        {{ Session::get('error') }}
                    </div>
                @endif

                <div class="col-xs-8 text-right">
                    <div class="row">
                        <!-- Datepicker Input -->
                        <div class="input-group col-xs-4 float-right">
                            <div class="form-group">
                                <div class="input-group date" data-provide="datepicker">
                                    <span class="input-group-addon">Order Date</span>
                                    <input type="date" class="form-control required" name="order_due_date"
                                        placeholder="Order Date" />

                                </div>
                            </div>
                        </div>

                        <!-- Order Number Input -->
                        <div class="input-group col-xs-4 float-right">
                            <span class="input-group-addon">{{$INVOICE_PREFIX}}</span>
                            <input type="text" name="order_id" id="order_id" class="form-control required"
                                placeholder="Order Number" aria-describedby="sizing-addon1" value="{{$orderId}}" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="float-left">Customer Information</h4>
                                <a href="#" class="float-right select-customer" data-toggle="modal"
                                    data-target="#customerModal"><b>OR</b>
                                    Select Existing Customer</a>
                                <div class="clear"></div>
                            </div>
                            <div class="panel-body form-group form-group-sm">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input type="hidden" name="customer_id" id="customer_id" class="form-control">
                                        <div class="form-group">
                                            <input type="text" class="form-control margin-bottom copy-input required"
                                                name="customer_name" id="customer_name" placeholder="Enter Name"
                                                tabindex="1">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control margin-bottom copy-input required"
                                                name="customer_address_1" id="customer_address_1"
                                                placeholder="Address 1" tabindex="3">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control margin-bottom copy-input required"
                                                name="customer_town" id="customer_town" placeholder="Town" tabindex="5">
                                        </div>
                                        <div class="form-group no-margin-bottom">
                                            <input type="text" class="form-control copy-input required"
                                                name="customer_postcode" id="customer_postcode" placeholder="Postcode"
                                                tabindex="7">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="input-group float-right margin-bottom">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" class="form-control copy-input required"
                                                name="customer_email" id="customer_email" placeholder="E-mail Address"
                                                aria-describedby="sizing-addon1" tabindex="2">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control margin-bottom copy-input"
                                                name="customer_address_2" id="customer_address_2"
                                                placeholder="Address 2" tabindex="4">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control margin-bottom copy-input required"
                                                name="customer_state" id="customer_state" placeholder="Country"
                                                tabindex="6">
                                        </div>
                                        <div class="form-group no-margin-bottom">
                                            <input type="text" class="form-control required" name="customer_phone"
                                                id="customer_phone" placeholder="Phone Number" tabindex="8">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 text-right">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Shipping Information</h4>
                            </div>
                            <div class="panel-body form-group form-group-sm">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control margin-bottom required"
                                                name="customer_name_ship" id="customer_name_ship"
                                                placeholder="Enter Name" tabindex="9">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control margin-bottom"
                                                name="customer_address_2_ship" id="customer_address_2_ship"
                                                placeholder="Address 2" tabindex="11">
                                        </div>
                                        <div class="form-group no-margin-bottom">
                                            <input type="text" class="form-control required" name="customer_state_ship"
                                                id="customer_state_ship" placeholder="Country" tabindex="13">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control margin-bottom required"
                                                name="customer_address_1_ship" id="customer_address_1_ship"
                                                placeholder="Address 1" tabindex="10">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control margin-bottom required"
                                                name="customer_town_ship" id="customer_town_ship" placeholder="Town"
                                                tabindex="12">
                                        </div>
                                        <div class="form-group no-margin-bottom">
                                            <input type="text" class="form-control required"
                                                name="customer_postcode_ship" id="customer_postcode_ship"
                                                placeholder="Postcode" tabindex="14">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / end client details section -->
                <div class="table-responsive table-nowrap">
                    <table class="table table-bordered table-hover table-striped" id="order_table" width="1500">
                        <thead>
                            <tr>
                                <th width="200" rowspan="2">
                                    <h4><a href="#" class="btn btn-success btn-xs add-row"><span
                                                class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                                        Product
                                    </h4>
                                </th>
                                <th colspan="2">
                                    <h4>Color</h4>
                                </th>
                                <th rowspan="2" width="150">
                                    <h4>Door Skin</h4>
                                </th>
                                <th colspan="2">
                                    <h4>Order Size</h4>
                                </th>
                                <th colspan="2">
                                    <h4>Cutting Size</h4>
                                </th>
                                <th rowspan="2">
                                    <h4>Qty</h4>
                                </th>

                            </tr>
                            <tr class="table-secondary">
                                <th>
                                    <h4>Front</h4>
                                </th>
                                <th>
                                    <h4>Back</h4>
                                </th>
                                <th>
                                    <h4>Height</h4>
                                </th>
                                <th>
                                    <h4>Width</h4>
                                </th>
                                <th>
                                    <h4>Height</h4>
                                </th>
                                <th>
                                    <h4>Width</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group form-group-sm  no-margin-bottom">
                                        <a href="#" class="btn btn-danger btn-xs delete-row"><span
                                                class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                        <input type="text" class="form-control form-group-sm item-input order_product"
                                            name="order_product[]" id="order_product[]"
                                            placeholder="Enter Design Name OR Description">
                                        <input type="text" id="order_product_id" name="order_product_id[]" hidden>
                                        <p class="item-select"><a href="#" data-toggle="modal"
                                                data-target="#productModal">select a product</a></p>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="form-group form-group-sm no-margin-bottom">
                                        <input type="text" class="form-control color" name="order_color_front[]"
                                            value="Black">
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="form-group form-group-sm no-margin-bottom">
                                        <input type="text" class="form-control color" name="order_color_back[]"
                                            value="Black">
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="form-group form-group-sm no-margin-bottom">
                                        <input type="text"
                                            class="form-control form-group-sm design-input order_door_skin"
                                            name="order_door_skin[]" placeholder="Enter Door Skin">
                                        <input type="text" id="order_design_id" name="order_design_id[]" hidden>
                                        <p class="design-select"><a href="#" data-toggle="modal"
                                                data-target="#designModal">select a Skin</a></p>
                                    </div>
                                </td>

                                <td class="text-right">
                                    <div class="input-group input-group-sm  no-margin-bottom">
                                        <span class="input-group-addon"> {{$SIZE_FORMAT}}</span>
                                        <input type="number" class="form-control updatesizeh"
                                            name="order_order_height[]" id="order_order_height" value="0"
                                            aria-describedby="sizing-addon1" placeholder="0.00">
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-addon"> {{$SIZE_FORMAT}}</span>
                                        <input type="number" class="form-control updatesizew" name="order_order_width[]"
                                            id="order_order_width" value="0" aria-describedby="sizing-addon1">
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-addon"> {{$SIZE_FORMAT}}</span>
                                        <input type="number" class="form-control calculate updatesizeh"
                                            name="order_billing_height[]" id="order_billing_height" value="0"
                                            aria-describedby="sizing-addon1">
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-addon"> {{$SIZE_FORMAT}}</span>
                                        <input type="number" class="form-control calculate updatesizew"
                                            name="order_billing_width[]" id="order_billing_width" value="0"
                                            aria-describedby="sizing-addon1">
                                    </div>
                                </td>

                                <td class="text-right">
                                    <div class="form-group form-group-sm no-margin-bottom">
                                        <input type="text" class="form-control order_product_qty calculate "
                                            name="order_product_qty[]" value="0">
                                        <!-- <input type="text" class="form-control order_product_qty calculate" name="order_product_qty[]" value="Black"> -->
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="order_totals" class="padding-right row text-right">
                    <div class="col-xs-6">
                        <div class="input-group form-group-sm textarea no-margin-bottom">
                            <textarea class="form-control" name="order_notes"
                                placeholder="Additional Notes..."></textarea>
                        </div>


                    </div>
                    <div class="col-xs-6">
                        <input type="email" name="custom_email" id="custom_email" class="custom_email_textarea"
                            placeholder="Enter custom email if you wish to override the default order type email msg!"></input>
                    </div>

                    <div class="col-xs-7 margin-top btn-group">
                        <input type="submit" id="action_create_order" class="btn btn-success float-right"
                            value="Create Order" data-loading-text="Creating...">
                    </div>
                </div>
                <div class="row">

                </div>
        </form>


        <!-- Customer Modal -->
        <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="customerModalLabel">Select Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="customerTable">
                                <!-- Rows will be populated dynamically via AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productModalLabel">Select Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered" id="productTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Rows will be populated dynamically via AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- Design Modal -->
        <div class="modal fade" id="designModal" tabindex="-1" role="dialog" aria-labelledby="designModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="designModalLabel">Select Design</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered" id="designTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Rows will be populated dynamically via AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </x-slot>
</x-app-layout>
<script>
    $(document).ready(function () {
        // Add a new row to the table
        $(document).on("click", ".add-row", function (e) {
            e.preventDefault(); // Prevent default form submission

            // Clone the first row, clear its input values, and append it to the table
            let newRow = $("#order_table tbody tr:first").clone();
            // newRow.find("input").val(""); // Clear all input fields in the new row
            newRow.removeClass("active-row"); // Remove any active-row class
            $("#order_table tbody").append(newRow);
        });

        // Delete a row from the table
        $(document).on("click", ".delete-row", function (e) {
            e.preventDefault(); // Prevent default form submission
            if ($("#order_table tbody tr").length > 1) {
                $(this).closest("tr").remove();
            } else {
                alert("You must have at least one row in the table.");
            }
        });

        // Customer Modal: Populate customer data
        $('#customerModal').on('show.bs.modal', function () {
            $.ajax({
                url: '/fetch-customers',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    let customerTable = $('#customerTable');
                    customerTable.empty();
                    data.forEach(customer => {
                        customerTable.append(`
                        <tr>
                            <td>${customer.name}</td>
                            <td>${customer.phone}</td>
                            <td>${customer.address_1}, ${customer.town}, ${customer.postcode}, ${customer.state}</td>
                            <td>
                                <button class="btn btn-primary btn-sm select-btn"
                                    data-id="${customer.id}"
                                    data-name="${customer.name}" 
                                    data-address1="${customer.address_1}"
                                    data-address2="${customer.address_2}"
                                    data-town="${customer.town}"
                                    data-postcode="${customer.postcode}"
                                    data-email="${customer.email}" 
                                    data-state="${customer.state}"
                                    data-phone="${customer.phone}"
                                    data-name_ship="${customer.name_ship}"
                                    data-address1_ship="${customer.address_1_ship}"
                                    data-address2_ship="${customer.address_2_ship}"
                                    data-town_ship="${customer.town_ship}"
                                    data-postcode_ship="${customer.postcode_ship}"
                                    data-state_ship="${customer.state_ship}">
                                    Select
                                </button>
                            </td>
                        </tr>
                    `);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching customers:', error);
                    alert('Unable to fetch customers. Please try again later.');
                }
            });
        });

        // Handle customer selection
        $(document).on('click', '.select-btn', function (e) {
            e.preventDefault(); // Prevent default form submission
            const c_id = $(this).data('id');
            const c_name = $(this).data('name');
            const c_address1 = $(this).data('address1');
            const c_address2 = $(this).data('address2');
            const c_town = $(this).data('town');
            const c_postcode = $(this).data('postcode');
            const c_email = $(this).data('email');
            const c_state = $(this).data('state');
            const c_phone = $(this).data('phone');
            const c_name_ship = $(this).data('name_ship');
            const c_address1_ship = $(this).data('address1_ship');
            const c_address2_ship = $(this).data('address2_ship');
            const c_town_ship = $(this).data('town_ship');
            const c_postcode_ship = $(this).data('postcode_ship');
            const c_state_ship = $(this).data('state_ship');
            $('#customer_id').val(c_id);
            $('#customer_name').val(c_name);
            $('#customer_address_1').val(c_address1);
            $('#customer_address_2').val(c_address2);
            $('#customer_town').val(c_town);
            $('#customer_postcode').val(c_postcode);
            $('#customer_email').val(c_email);
            $('#customer_state').val(c_state);
            $('#customer_phone').val(c_phone);
            $('#customer_name_ship').val(c_name_ship);
            $('#customer_address_1_ship').val(c_address1_ship);
            $('#customer_address_2_ship').val(c_address2_ship);
            $('#customer_town_ship').val(c_town_ship);
            $('#customer_postcode_ship').val(c_postcode_ship);
            $('#customer_state_ship').val(c_state_ship);
            $('#customerModal').modal('hide');
        });

        // Product Modal: Initialize DataTable and populate rows
        $('#productModal').on('show.bs.modal', function () {
            const productTable = $('#productTable');
            if (!$.fn.DataTable.isDataTable(productTable)) {
                productTable.DataTable({
                    ajax: {
                        url: '/fetch-products',
                        type: 'GET',
                        dataSrc: ''
                    },
                    columns: [
                        { data: 'id' },
                        { data: 'name' },
                        { data: 'description' },
                        {
                            data: null,
                            render: function (data) {
                                return `
                                    <button class="btn btn-primary btn-sm select-btn-product" 
                                        data-id="${data.id}" 
                                        data-name="${data.name}">
                                        Select
                                    </button>`;
                            }
                        }
                    ],
                    paging: true,
                    searching: true,
                    ordering: true,
                    lengthChange: true,
                    pageLength: 5,
                    language: {
                        search: "Filter records:",
                        lengthMenu: "Show _MENU_ entries",
                        zeroRecords: "No matching records found",
                        info: "Showing _START_ to _END_ of _TOTAL_ entries",
                        infoEmpty: "Showing 0 to 0 of 0 entries"
                    }
                });
            }
        });

        // Handle product selection
        $(document).on('click', '.select-btn-product', function (e) {
            e.preventDefault(); // Prevent default form submission
            const p_id = $(this).data('id');
            const p_name = $(this).data('name');
            const activeRow = $("#order_table tbody tr.active-row");
            activeRow.find('input[name="order_product_id[]"]').val(p_id);
            activeRow.find('input[name="order_product[]"]').val(p_name);
            $('#productModal').modal('hide');
        });

        // Design Modal: Initialize DataTable and populate rows
        $('#designModal').on('show.bs.modal', function () {
            const designTable = $('#designTable');
            if (!$.fn.DataTable.isDataTable(designTable)) {
                designTable.DataTable({
                    ajax: {
                        url: '/fetch-designs',
                        type: 'GET',
                        dataSrc: ''
                    },
                    columns: [
                        { data: 'id' },
                        { data: 'name' },
                        { data: 'description' },
                        {
                            data: null,
                            render: function (data) {
                                return `
                                    <button class="btn btn-primary btn-sm select-btn-design" 
                                        data-id="${data.id}" 
                                        data-name="${data.name}">
                                        Select
                                    </button>`;
                            }
                        }
                    ],
                    paging: true,
                    searching: true,
                    ordering: true,
                    lengthChange: true,
                    pageLength: 5,
                    language: {
                        search: "Filter records:",
                        lengthMenu: "Show _MENU_ entries",
                        zeroRecords: "No matching records found",
                        info: "Showing _START_ to _END_ of _TOTAL_ entries",
                        infoEmpty: "Showing 0 to 0 of 0 entries"
                    }
                });
            }
        });

        // Handle design selection
        $(document).on('click', '.select-btn-design', function (e) {
            e.preventDefault(); // Prevent default form submission
            const d_id = $(this).data('id');
            const d_name = $(this).data('name');
            const activeRow = $("#order_table tbody tr.active-row");
            activeRow.find('input[name="order_design_id[]"]').val(d_id);
            activeRow.find('input[name="order_door_skin[]"]').val(d_name);
            $('#designModal').modal('hide');
        });

        // Activate a row on click
        $(document).on("click", "#order_table tbody tr", function () {
            $("#order_table tbody tr").removeClass("active-row");
            $(this).addClass("active-row");
        });
    });
</script>