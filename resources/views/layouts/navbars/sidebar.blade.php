<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Admin Panel') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('admin.users.index')}}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Users') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'blogs' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('admin.blogs.index')}}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Blogs') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'blog-categories' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('admin.blog-categories.index')}}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Categories') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'news' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('admin.news.index')}}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('News') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>