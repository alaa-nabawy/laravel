<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar Buttons -->
  <ul class="navbar-nav pr-0 pl-3">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Search Form (If needed, can be removed!) -->
  <form class="form-inline ml-3 d-none d-sm-inline-block">
    <div class="input-group input-group-sm">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
      <input class="form-control form-control-navbar" type="search" placeholder="بحث" aria-label="Search">
    </div>
  </form>
  <!-- Sidebar user panel (optional) -->


  <!-- Right navbar Buttons -->
  <ul class="navbar-nav p-0 ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link m-0" data-toggle="dropdown" href="#">
        <div class="user-panel py-2 pr-1 d-flex">
          <div class="image">
            <img src="" class="img-circle elevation-2" alt="User Image">
          </div>
          <p class="info m-0"></p>
        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-left">
        <a href="{{route('logout')}}" class="dropdown-item dropdown-footer">
          <i class="fas fa-sign-out-alt ml-2"></i>
          Logout
        </a>
      </div>
    </li>
  </ul>
</nav><!-- /.navbar -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link text-center">
    <img src="{{config('constants.API_URL')}}settings/img/header?width=60&height=60">
    <span class="brand-text font-weight-light text-center">{{isset($settings) ? $settings->translation()->title : '' }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar" dir="ltr">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{route('index')}}" class="nav-link {{$menu_tab == 'home' ? 'active' : ''}}">
            <i class="nav-icon fas fa-home"></i>
            <p>Home</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('users')}}" class="nav-link  {{$menu_tab == 'users' ? 'active' : ''}}">
            <i class="nav-icon fas fa-users"></i>
            <p>Users</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('categories')}}" class="nav-link {{$menu_tab == 'categories' ? 'active' : ''}}">
            <i class="nav-icon fas fa-layer-group"></i>
            <p>Categories</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('languages')}}" class="nav-link">
            <i class="nav-icon fas fa-ad"></i>
            <p>Ads</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('languages')}}" class="nav-link">
            <i class="nav-icon fas fa-user-tag"></i>
            <p>Ads Features</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('languages')}}" class="nav-link">
            <i class="nav-icon fas fa-dollar-sign"></i>
            <p>Currencies</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('languages')}}" class="nav-link  {{$menu_tab == 'languages' ? 'active' : ''}}">
            <i class="nav-icon fas fa-globe"></i>
            <p>Languages</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('settings')}}" class="nav-link {{$menu_tab == 'settings' ? 'active' : ''}}">
            <i class="nav-icon fas fa-cogs"></i>
            <p>Settings</p>
          </a>
        </li>
          
      </ul>
    </nav>
  </div>
</aside>
