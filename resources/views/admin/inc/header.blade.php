<header class="main-header">
    <!-- Logo -->
    <a href="{{route('admin.index')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
            <img src="{{url('/')}}/admin_assets/dist/img/logo.png" width="40px">
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            <img src="{{url('/')}}/admin_assets/dist/img/logo.png" width="70px">
        </span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{url('/')}}/admin_assets/dist/img/admin.png" class="user-image" alt="User Image">
                <span class="hidden-xs">{{auth()->guard('admin')->user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                    <img src="{{url('/')}}/admin_assets/dist/img/admin.png" class="img-circle" alt="User Image">
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="text-center">
                        <a href="{{route('admin.logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                </li>
            </ul>

            </li>
        </ul>
        </div>
    </nav>
</header>