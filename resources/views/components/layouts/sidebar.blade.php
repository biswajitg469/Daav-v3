<aside class="main-sidebar" style="background-color: #222d32;">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" style="color: white;">
            <li class="header" style="color: white;background: #1a2226;">MENU</li>
            <!-- Menu 0.1 -->
            <li class="treeview">
                <a href="{{url('/dashboard')}}" style="color: white;"><i class="fa fa-tachometer"></i><span>Dashboard</span></a>
            </li>
            <!-- Menu 1 -->
            <li class="treeview">
                <a href="#" style="color: white;"><i class="fa fa-file-text"></i><span>Bills and Orders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/order')}}" style="color: white;"><i class="fa fa-solid fa-file-circle-plus"></i>Create Order-Bill</a></li>
                    <li><a href="{{url('manage_order_Bill_View')}}" style="color: white;"><i class="fa fa-solid fa-list-check"></i>Manage Order-Bill</a></li>
                    <li><a href="{{url('estimate_Bill_view')}}" style="color: white;"><i class="fa fa-plus"></i>Create Estimate-Bill</a></li>
                    <li><a href="{{url('manage_estimate_bill')}}" style="color: white;"><i class="fa fa-cog"></i>Manage Estimate-Bill</a></li>
                    <li><a href="#" class="download-csv" style="color: white;"><i class="fa fa-download"></i>Download CSV</a></li>
                </ul>
            </li>
            <!-- Menu 2 -->
            <li class="treeview">
                <a href="#" style="color: white;"><i class="fa fa-archive"></i><span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('product')}}" style="color: white;"><i class="fa fa-plus"></i>Add Products</a></li>
                    <li><a href="{{url('product_manage')}}" style="color: white;"><i class="fa fa-cog"></i>Manage Products</a></li>
                    <li><a href="{{url('design')}}" style="color: white;"><i class="fa fa-solid fa-pen-nib"></i>Add Design</a></li>
                    <li><a href="{{url('design_manage')}}" style="color: white;"><i class="fa fa-solid fa-pen-ruler"></i>Manage Design</a></li>
                </ul>
            </li>
            <!-- Menu 3 -->
            <li class="treeview">
                <a href="#" style="color: white;"><i class="fa fa-users"></i><span>Customers</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url(('customer'))}}" style="color: white;"><i class="fa fa-user-plus"></i>Add Customer</a></li>
                    <li><a href="#" style="color: white;"><i class="fa fa-cog"></i>Manage Customers</a></li>
                </ul>
            </li>
            <!-- Menu 4 -->
            <li class="treeview">
                <a href="#" style="color: white;"><i class="fa fa-solid fa-cart-shopping"></i><span>Delivery</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#" style="color: white;"><i class="fa fa-solid fa-truck"></i>Add Delivery</a></li>
                    <li><a href="#" style="color: white;"><i class="fa fa-solid fa-magnifying-glass-chart"></i>Manage Delivery</a></li>
                    <li><a href="#" style="color: white;"><i class="fa fa-solid fa-map-location-dot"></i>Manage Delivery Address</a></li>
                </ul>
            </li>
            <!-- Menu 5 -->
            <li class="treeview">
                <a href="#" style="color: white;"><i class="fa fa-solid fa-industry"></i><span>Factory</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#" style="color: white;"><i class="fa fa-solid fa-folder-plus"></i>Create Work Order</a></li>
                    <li><a href="#" style="color: white;"><i class="fa fa-solid fa-pen-to-square"></i>Edit Work Order</a></li>
                    <li><a href="#" style="color: white;"><i class="fa fa-solid fa-gears"></i>Manage Factory Details</a></li>
                </ul>
            </li>
            <!-- Menu 6 -->
            <li class="treeview">
                <a href="#" style="color: white;"><i class="fa fa-user"></i><span>System Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#" style="color: white;"><i class="fa fa-plus"></i>Add User</a></li>
                    <li><a href="#" style="color: white;"><i class="fa fa-cog"></i>Manage Users</a></li>
                </ul>
            </li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
