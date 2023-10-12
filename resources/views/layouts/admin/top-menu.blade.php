<nav class="main-header navbar navbar-expand navbar-dark navbar-dark">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
      @if(Auth::user() )
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      @endif
      @if(!Auth::user())
          <li class="nav-item d-none d-sm-inline-block">

        <a href="" class="brand-link">
          <img src="{{ asset('assets/images/food-logo.png') }}" alt="AdminLTE Logo" class="brand-image " style="margin-top: -10px" height ='30px' style="opacity: .8">
          </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/" class="nav-link">Online Food Ordering</a>
        </li>
      @endif
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @if(!Auth::user())
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ url('login') }}" class="nav-link">Admin Login</a>
        </li>
        @else
        <li class="nav-item d-none d-sm-inline-block">
          <button class="btn btn-transparent text-white" onclick="logoutFunc()" class="nav-link">Logout</button>
        </li>
      @endif
      
    </ul>
</nav>