  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-purple elevation-2">
      <!-- Brand Logo -->
      <a href="/" class="brand-link">
          <img src="{{ asset('assets/img/retail.png') }}" alt="AdminLTE Logo" class="brand-image img-circle">
          <span class="brand-text font-weight-bold">POSTER MARKET</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('assets/img/user.png') }}" class="img-circle" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ Auth::user()->username }}</a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  {{-- <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li> --}}
                  <li class="nav-item">
                      <a href="{{ route('dashboard') }}"
                          class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                          <i
                              class="nav-icon {{ Auth::user()->group_id == 1 ? 'fas fa-tachometer-alt' : 'fas fa-home' }}"></i>
                          <p>
                              {{ Auth::user()->group_id == 1 ? 'Dashboard' : 'Home' }}
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('list-produk') }}"
                          class="nav-link {{ Request::is('list-produk') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-shopping-bag"></i>
                          <p>
                              List Produk
                          </p>
                      </a>
                  </li>
                  {{-- <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Produk
              </p>
            </a>
          </li> --}}
                  @if (Auth::user()->group_id == 1)
                      <li class="nav-item">
                          <a href="{{ route('produk') }}"
                              class="nav-link {{ Request::is('data-produk') || Request::is('tambah-produk') || Request::is('edit-produk*') ? 'active' : '' }}">
                              <i class="nav-icon fas fa-table"></i>
                              <p>
                                  Data Produk
                              </p>
                          </a>
                      </li>
                  @endif
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
