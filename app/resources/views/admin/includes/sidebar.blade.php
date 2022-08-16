<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-warning elevation-4">
    <!-- Brand Logo -->
    <a href="{{ URL('admin/dashboard')}}" class="brand-link">
        <span class="brand-text font-weight-light">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ URL('admin/users')}}" class="nav-link {{ (request()->segment(2) == 'users') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL('admin/logout') }}" class="nav-link {{ (request()->segment(2) == 'logout') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-key"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
