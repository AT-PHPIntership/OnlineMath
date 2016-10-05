<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('page-title') @lang('common.header.title')
    </title>
    @include('backend.layouts.partials.header')
      @stack('stylesheet')
  </head>
  <!--/head-->
  <body class="homepage">
    <header id="header">
      @include('backend.layouts.partials.search')
      @include('backend.layouts.partials.nav')
    </header>
    <!-- /header -->
    <!--content-->

      <div class="container">
        <h2>@yield('section-title')</h2>
        @yield('content')
      </div>
    <!--/#main-slider-->
    
    <!--/#footer-->
    @include('backend.layouts.partials.jquery')
    @stack('end-page-scripts')
  </body>
</html>
