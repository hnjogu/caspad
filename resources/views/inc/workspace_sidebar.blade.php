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
        @can('job-unclaim')
          <div class="info">
              <ul class="nav nav-pills nav-sidebar flex-column">
                  <li class="nav-item">
                      <a class="btn btn-info btn-sm" href="/findwork/{{$row->id}}/unclaim">Unclaim Project</a>
                  </li>
              </ul>
          </div>
        @endcan
      </div>

      <!-- Sidebar Menu -->
      <nav class="navbar mt-2 navbar-default" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @can('freelancer-workspace')
            <li class="nav-item text-white">
                    <p>Customer : {{$row->customer_name}}</p>
                    <hr>
                    <p>Project : {{$row->project_id}}</p>
                    <hr>
                    <p>Pay : $</p>
                    <hr>
            </li>
          @endcan
        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <script type="text/javascript">
    var vid = document.getElementById("myVideo");
    vid.onplay = function() {
      //alert("The video has started to play");
    };
  </script>
