<x-app-layout>
    <x-slot name="title">
        <h1>Manage Order Bill</h1>
        <div id="response" class="alert alert-success " style="display:none; width: auto;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <div class="message"></div>
        </div>
        <div class="container mb-5" style="width:auto; height:100px;"></div>
        <div class="container mt-5" style="width:auto;">
            <!-- DataTable Panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="container">
                        <h2>Manage Invoices</h2>
                        <div class="table-responsive">
                            <table id="invoicesTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Invoice</th>
                                        <th>Customer</th>
                                        <th>Issue Date</th>
                                        <th>Due Date</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span class="badge ">

                                            </span>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-warning">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <a href="" class="btn btn-sm btn-success">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                            <a href="" class="btn btn-sm btn-info">
                                                <i class="fa fa-download"></i>
                                            </a>
                                            <a href="" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </x-slot>
</x-app-layout>
