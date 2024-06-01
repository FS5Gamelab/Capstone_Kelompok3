
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
           
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item my-auto">
                Selamat Datang {{ Auth::user()->name }}
             </li>
            

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-user" ></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    
                    <div class="dropdown-divider"></div>
                    <a href="/company-profile" class="dropdown-item">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> Profiles
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fa fa-sign-out"></i>Log out
                        </button>
                    </form>
                    
                    <div class="dropdown-divider"></div>
                    
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
           
        </ul>
    </nav>
 