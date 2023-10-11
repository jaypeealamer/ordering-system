@include('layouts.admin.head')
  @include('layouts.admin.top-menu')
  @include('layouts.admin.left-menu')
  <div class="content-wrapper">
    @yield('content')
  </div>


@include('layouts.admin.footer')
@yield('js')
