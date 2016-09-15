<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('page-title') @lang('common.header.title')
    </title>
    @include('backend.layouts.partials.header')
  </head>
  <!--/head-->
  <body class="homepage">
    <header id="header">
      @include('backend.layouts.partials.search')
      @include('backend.layouts.partials.nav')
    </header>
    <!-- /header -->
    <!--content-->
    <section id="recent-works">
      <div class="container">
        @include('backend.layouts.partials.messages')
        @yield('content')
      </div>
    </section>
    <!--/#main-slider-->
    @include('backend.layouts.partials.footer')
    <!--/#footer-->
    @include('backend.layouts.partials.jquery')
  </body>
</html>
