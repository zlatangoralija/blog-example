<div class="wrapper ">
  @include('layouts.navbars.sidebar')
  <div class="main-panel">
    @include('layouts.navbars.navs.auth')
    @isset($breadcrumbs)
          @include('layouts.breadcrumbs.breadcrumbs')
    @endif
    @yield('content')
  </div>
</div>
