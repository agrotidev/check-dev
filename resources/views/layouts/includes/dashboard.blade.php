<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  {{-- Header --}}
  <head>
    <title> @yield('title') </title>

    @include('layouts.includes.partials.styles')

    {{-- LINK --}}
    @yield('style')
  </head>

  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="#">S.I.Q</a>
      <!-- Sidebar toggle button-->
      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!--Notification Menu-->
        
        <!-- User Menu-->
        @yield('user-menu')
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <ul class="app-menu">
        @yield('app-menu')
      </ul>
    </aside>

    <main class="app-content">

      @yield('content')
      
    </main>

    @include('layouts.includes.partials.scripts')

    @yield('scripts')
  </body>
</html>