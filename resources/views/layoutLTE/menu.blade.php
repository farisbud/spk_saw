  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="{{asset('adminLTE/dist/img/AdminLTELogo.png')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="/home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/kriteria" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>kriteria</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/alternatif" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alternatif</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-header">SAW</li>
          
          <li class="nav-item">
            <a href="/perhitungan-saw" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Perhitungan SAW
              </p>
            </a>
          </li>

          <li class="nav-header">Setting</li>
          
          <li class="nav-item">
            <a href="/perhitungan-saw" class="nav-link">
              <i class="nav-icon far fa-circle"></i>
              <p>
                User
              </p>
            </a>
          </li>
        
          
          <li class="nav-item">
            <form action="{{ Route('logout') }}" method="post">
            @csrf
            <button type="submit" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                  Log out
                </button>
            </form>
                
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>