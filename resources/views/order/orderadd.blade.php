<x-app-layout>
    <x-slot name="title">
        <h1>Add Order</h1>
        <div id="response" class="alert alert-success " style="display:none; width: auto;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <div class="message"></div>
        </div>
        {{-- <x-slot name="content"> --}}
            {{-- <style>
                .main-sidebar{
                    min-height: 200px;
                }
            </style> --}}

        <form method="post" id="create_invoice">
            <input type="hidden" name="action" value="create_invoice">

            <div class="row">
                <div class="col-xs-4"></div>
                <div class="col-xs-8 text-right">
                    <div class="row">

                        <div class="col-xs-6">
                            {{-- <h2 class="">Select Type:</h2> --}}
                        </div>
                        {{-- <div class="col-xs-3">
                            <select name="invoice_type" id="invoice_type" class="form-control">
                                <option value="Estimate-Bill" selected>Estimate-Bill</option>
                                <!-- <option value="quote">Quote</option>
                                <option value="receipt">Receipt</option> -->
                            </select>
                        </div> --}}
                        {{-- <div class="col-xs-3">
                            <select name="invoice_status" id="invoice_status" class="form-control">
                                <option value="open" selected>Open</option>
                                <option value="close">Close</option>
                            </select>
                        </div> --}}
                    </div>
                    {{-- <div class="col-xs-4 no-padding-right">
                        <div class="form-group">
                            <div class="input-group date" id="invoice_date">
                                <input type="text" class="form-control required" name="invoice_date"
                                    placeholder="Invoice Date" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div> --}}
                    <div class="input-group col-xs-4 float-right">
                        <div class="form-group">
                            <div class="input-group date" id="invoice_due_date">
                                <input type="text" class="form-control required" name="invoice_due_date"
                                    placeholder="Due Date" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group col-xs-4 float-right">
                        <span class="input-group-addon">INVOICE_PREFIX</span>
                        <input type="text" name="invoice_id" id="invoice_id" class="form-control required"
                            placeholder="Invoice Number" aria-describedby="sizing-addon1" value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="float-left">Customer Information</h4>
                            <a href="#" class="float-right select-customer"><b>OR</b> Select Existing Customer</a>
                            <div class="clear"></div>
                        </div>
                        <div class="panel-body form-group form-group-sm">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control margin-bottom copy-input required"
                                            name="customer_name" id="customer_name" placeholder="Enter Name"
                                            tabindex="1">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control margin-bottom copy-input required"
                                            name="customer_address_1" id="customer_address_1" placeholder="Address 1"
                                            tabindex="3">
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
                                            name="customer_address_2" id="customer_address_2" placeholder="Address 2"
                                            tabindex="4">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control margin-bottom copy-input required"
                                            name="customer_county" id="customer_county" placeholder="Country"
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
                                        <input type="text" class="form-control required"
                                            name="customer_county_ship" id="customer_county_ship"
                                            placeholder="Country" tabindex="13">
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
                <table class="table table-bordered table-hover table-striped" id="invoice_table" width="1500">
                    <thead>
                        <tr>
                            <th width="200" rowspan="2">
                                <h4><a href="#" class="btn btn-success btn-xs add-row"><span
                                            class="glyphicon glyphicon-plus" aria-hidden="true"></span></a> Product
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
                            <th rowspan="2">
                                <h4>Ratee</h4>
                            </th>

                            <th rowspan="2">
                                <h4>Sub Total</h4>
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
                                    <input type="text"
                                        class="form-control form-group-sm item-input invoice_product"
                                        name="invoice_product[]" placeholder="Enter Design Name OR Description">
                                    <p class="item-select">or <a href="#">select a product</a></p>
                                </div>
                            </td>
                            <td class="text-right">
                                <div class="form-group form-group-sm no-margin-bottom">
                                    <input type="text" class="form-control color" name="invoice_color_front[]"
                                        value="Black">
                                </div>
                            </td>
                            <td class="text-right">
                                <div class="form-group form-group-sm no-margin-bottom">
                                    <input type="text" class="form-control color" name="invoice_color_back[]"
                                        value="Black">
                                </div>
                            </td>
                            <td class="text-right">
                                <div class="form-group form-group-sm no-margin-bottom">
                                    <input type="text"
                                        class="form-control form-group-sm design-input invoice_door_skin"
                                        name="invoice_door_skin[]" placeholder="Enter Door Skin">
                                    <p class="design-select">or <a href="#">select a Skin</a></p>
                                </div>
                            </td>

                            <td class="text-right">
                                <div class="input-group input-group-sm  no-margin-bottom">
                                    <span class="input-group-addon"> </span>
                                    <input type="number" class="form-control updatesizeh"
                                        name="invoice_order_height[]" id="invoice_order_height"
                                        value="0"aria-describedby="sizing-addon1" placeholder="0.00">
                                </div>
                            </td>
                            <td class="text-right">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon"> </span>
                                    <input type="number" class="form-control updatesizew"
                                        name="invoice_order_width[]" id="invoice_order_width" value="0"
                                        aria-describedby="sizing-addon1">
                                </div>
                            </td>
                            <td class="text-right">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon"> SIZE_FORMAT</span>
                                    <input type="number" class="form-control calculate updatesizeh"
                                        name="invoice_billing_height[]" id="invoice_billing_height" value="0"
                                        aria-describedby="sizing-addon1" disabled>
                                </div>
                            </td>
                            <td class="text-right">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon"> </span>
                                    <input type="number" class="form-control calculate updatesizew"
                                        name="invoice_billing_width[]" id="invoice_billing_width" value="0"
                                        aria-describedby="sizing-addon1" disabled>
                                </div>
                            </td>

                            <td class="text-right">
                                <div class="form-group form-group-sm no-margin-bottom">
                                    <input type="text" class="form-control invoice_product_qty calculate "
                                        name="invoice_product_qty[]" value="0">
                                    <!-- <input type="text" class="form-control invoice_product_qty calculate" name="invoice_product_qty[]" value="Black"> -->
                                </div>
                            </td>
                            <td class="text-right">
                                <div class="form-group form-group-sm no-margin-bottom">
                                    <input type="text" class="form-control invoice_product_price calculate"
                                        name="invoice_product_price[]" value="0">
                                </div>
                            </td>

                            <td class="text-right">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="form-control calculate-sub"
                                        name="invoice_product_sub[]" id="invoice_product_sub" value="0.00"
                                        aria-describedby="sizing-addon1" disabled>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="invoice_totals" class="padding-right row text-right">
                <div class="col-xs-6">
                    <div class="input-group form-group-sm textarea no-margin-bottom">
                        <textarea class-"form-control" name="invoice_notes" placeholder="Additional Notes..."></textarea>
                    </div>


                </div>
                <div class="col-xs-6">
                    <input type="email" name="custom_email" id="custom_email" class="custom_email_textarea"
                        placeholder="Enter custom email if you wish to override the default invoice type email msg!"></input>
                </div>

                <div class="col-xs-7 margin-top btn-group">
                    <input type="submit" id="action_create_invoice" class="btn btn-success float-right"
                        value="Create Order" data-loading-text="Creating...">
                </div>


            </div>
            <div class="row">

            </div>
        </form>

        <div id="insert" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Select Product</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-primary"
                            id="selected">Add</button>
                        <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <div id="insert_d" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Select Design</h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-primary"
                            id="selected">Add</button>
                        <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div id="insert_customer" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Select An Existing Customer</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </x-slot>
</x-app-layout>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    $(document).ready(function () {
        // Add a new row when the add button is clicked
        $(document).on("click", ".add-row", function (e) {
            e.preventDefault();

            // Clone the first row in the tbody and clear the input values
            let newRow = $("#invoice_table tbody tr:first").clone();

            // Reset input values for the new row
            newRow.find("input").val("");
            newRow.find(".calculate-sub").val("0.00");

            // Append the cloned row to the tbody
            $("#invoice_table tbody").append(newRow);
        });

        // Remove a row when the remove button is clicked
        $(document).on("click", ".delete-row", function (e) {
            e.preventDefault();

            // Remove the row only if there are more than one row remaining
            if ($("#invoice_table tbody tr").length > 1) {
                $(this).closest("tr").remove();
            } else {
                alert("You must have at least one row in the table.");
            }
        });
    });
</script>

