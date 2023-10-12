@include('layouts.admin.head')
  @include('layouts.admin.top-menu')
  @if(Auth::user())
  @include('layouts.admin.left-menu')
  @endif

  <div class="content-wrapper">
    @yield('content')
  </div>


@include('layouts.admin.footer')
@yield('js')
