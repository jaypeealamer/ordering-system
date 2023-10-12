 <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
        <img src="{{ asset('assets/images/food-logo.png') }}" alt="AdminLTE Logo" class="brand-image " style="opacity: .8">
        <span class="brand-text font-weight-light">Food Ordering</span>
        </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            
            <img src="{{ asset('assets/images/profile-default.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">{{ ucwords(Auth::user()->name) }}</a>
            </div>
        </div>

   

    <!-- Sidebar Menu -->
      <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
            <li class="nav-item">
                <a href="{{url('admin/menu')}}" class="nav-link  {{ (request()->is('admin/menu')) ? 'active' : ''  }} ">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Menus
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('admin/orders')}}" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                    Orders
                    <span class="badge badge-info right" id="total_new_order"></span>
                </p>
                </a>
            </li>
            <li class="nav-header">SETTINGS</li>
            <li class="nav-item">
                <a href="{{url('admin/category')}}" class="nav-link {{ (request()->is('admin/category')) ? 'active' : ''  }}">
                <i class="nav-icon far fa-list-alt"></i>
                <p>
                    Category
                </p>
                </a>
            </li>
            <li class="nav-header">SETTINGS</li>
            <li class="nav-item">
                <a href="{{url('admin/user')}}" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>
                    User Management
                </p>
                </a>
            </li>
            
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
  </aside>
  