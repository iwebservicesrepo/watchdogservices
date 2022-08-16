<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('admin/images/AdminLTELogo.png') }}" alt="" height="60" width="60">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-th-large"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                <div class="dropdown-divider"></div>
                <!--a href="" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> Profile
                </a>
                <div class="dropdown-divider"></div-->
                <a href="{{ URL('admin/profile') }}" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Update Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ URL('admin/logout') }}" class="dropdown-item">
                    <i class="fas fa-key mr-2"></i> Logout
                </a>
            </div>
        </li>
        <!--li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li-->
    </ul>
</nav>
<!-- /.navbar -->
