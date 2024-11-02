<header class="main-header" style="width: 100%; padding: 0; margin: 0;">

    <!-- Logo -->
    <a href="" class="logo" style="background: green;color: white;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>IN</b>MS</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Invoice</b> System</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" style="color: white;" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav" style="margin-right: 45px;margin-top: -8px;">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('images/user_image.png') }}" class="user-image img-circle elevation-2"
                            alt="User Image">
                        <span class="d-none d-md-inline user">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <li class="dropdown-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-default btn-flat">Log out</button>
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>