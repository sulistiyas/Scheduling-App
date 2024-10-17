<!-- Main Sidebar Container -->
<aside class="main-sidebar main-sidebar-custom sidebar-light-warning elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('assets/dist/img/INL_Logo_Only.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SCHEDULING - APP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @php
              $user_id = Auth::user()->id;
              // if women : pict women 
              // if men : pict men
          @endphp
          <img src="{{ asset('assets/dist/img/avatar4.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="{{ Request::routeIs('dashboard') ? 'nav-link active' : 'nav-link' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          {{-- Driver --}}
          <li class="{{ Request::routeIs('index_driver') || Request::routeIs('create_book_driver') ||  Request::routeIs('index_create_driver') || Request::routeIs('index_result_driver') ? 'nav-item menu-open' : 'nav-item menu' }}">
            <a href="#" class="{{ Request::routeIs('index_driver') || Request::routeIs('create_book_driver') ||  Request::routeIs('index_create_driver') || Request::routeIs('index_result_driver') ? 'nav-link active' : 'nav-link' }}">
              <i class="nav-icon fas fa-car-side"></i>
              <p>
                Driver
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Auth::user()->user_level == '0')
                  <li class="nav-item">
                    <a href="{{ route('index_create_driver') }}"class="{{ Request::routeIs('index_create_driver') ? 'nav-link active' : 'nav-link' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Driver</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('create_book_driver') }}"class="{{ Request::routeIs('create_book_driver') ? 'nav-link active' : 'nav-link' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Book Driver</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('index_driver') }}"class="{{ Request::routeIs('index_driver') || Request::routeIs('index_result_driver') ? 'nav-link active' : 'nav-link' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Schedule</p>
                    </a>
                  </li>
              @else
                  <li class="nav-item">
                    <a href="{{ route('create_book_driver') }}"class="{{ Request::routeIs('create_book_driver') ? 'nav-link active' : 'nav-link' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Book Driver</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('index_driver') }}"class="{{ Request::routeIs('index_driver') || Request::routeIs('index_result_driver') ? 'nav-link active' : 'nav-link' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Schedule</p>
                    </a>
                  </li>
              @endif
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- Messenger --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-motorcycle"></i>
              <p>
                Messenger
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Schedule</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>
            </ul>
          </li>
          @if (Auth::user()->user_level == '0')
            {{-- User Management --}}
            <li class="{{ Request::routeIs('index_user') ? 'nav-item menu-open' : 'nav-item menu' }}">
              <a href="#" class="{{ Request::routeIs('index_user') ? 'nav-link active' : 'nav-link' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  User Management
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('index_user') }}" class="{{ Request::routeIs('index_user') ? 'nav-link active' : 'nav-link' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User Data</p>
                  </a>
                </li>
              </ul>
              {{-- <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Report</p>
                  </a>
                </li>
              </ul> --}}
            </li>
          @else
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <div class="sidebar-custom">
      <form method="POST" action="{{ route('logout') }}" x-data>
        @csrf
        <button type="submit" class="btn btn-default"><i class="fas fa-power-off"></i></button>
        <a href="{{ url('https://wa.me/+6282110873602') }}" class="btn btn-secondary hide-on-collapse pos-right" target="_blank">Contact Support</a>
      </form>
      {{-- <a href="{{ route('logout') }}" class="btn btn-link"><i class="fas fa-cogs"></i></a> --}}
      
    </div>
  </aside>