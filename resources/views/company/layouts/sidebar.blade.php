<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link text-center">
                <span class="brand-text font-weight-light">Company Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/company/jobs" class="nav-link ">
                        <i class="nav-icon fa fa-briefcase"></i>
                        <p>
                            Jobs
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/company-category" class="nav-link ">
                        <i class="nav-icon fa fa-list"></i>
                        <p>
                            Kategori
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/applications" class="nav-link ">
                        <i class="nav-icon fa fa-address-book"></i>
                        <p>
                           Lamaran
                        </p>
                    </a>
                </li>
                
                
                </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>