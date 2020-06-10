<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary accent-orange elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
        <img src="{{ asset('storage/logo/caspad.png') }}" alt="Logo" class="brand-logo  elevation-4"
             style="opacity: .8">
        <span class="brand-text font-weight-bold">CASPAD</span>
      </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="profile-image">
          <img src="{{ asset('storage/uploads/avatars/'. Auth::user()->avatar) }}" class="img-circle" alt="User Image">
        </div> --}}
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->email }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="navbar mt-2 navbar-default" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @can('home-dashboard')
            <li class="nav-item active">
                <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{ url('/home') }}">
                    <i class="nav-icon fa fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
          @endcan
          @can('user-list')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="{{ route('users.index') }}">
                    <i class="nav-icon fa fa-users"></i>
                    <p>Manage Users</p>
                </a>
            </li>
          @endcan
          @can('role-list')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('roles') ? 'active' : '' }}" href="{{ route('roles.index') }}">
                    <i class="nav-icon fa fa-signal"></i>
                    <p>Manage Roles</p>
                </a>
            </li>
          @endcan

          @can('permissions-list')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('showpermissions') ? 'active' : '' }}" href="{{ route('showpermissions') }}">
                    <i class="nav-icon fa fa-arrows-alt"></i>
                    <p>Manage Permission</p>
                </a>
            </li>
          @endcan

          @can('Projects-dashboard')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('getprojectsindex') ? 'active' : '' }}" href="{{ route('getprojectsindex') }}">
                    <i class="nav-icon far fa-flag"></i>
                    <p>Manage Projects</p>
                </a>
            </li>
          @endcan

          <li class="nav-item">
              <a class="nav-link {{ Request::is('accounts') ? 'active' : '' }}" href="{{ route('accounts') }}">
                  <i class="nav-icon far fa-flag"></i>
                  <p>Manage Accounts</p>
              </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
