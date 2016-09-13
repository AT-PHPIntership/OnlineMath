<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('page-title') @lang('common.header.title')
    </title>
    @include('frontend.layouts.partials.header')
  </head>
  <!--/head-->
  <body class="homepage">
    <header id="header">
      @include('frontend.layouts.partials.search')
      @include('frontend.layouts.partials.nav')
    </header>
    <!-- /header -->
    <!--/header-->
    @include('frontend.layouts.partials.slider')
    <!--content-->
    <section id="recent-works">
      <div class="container">
        @include('frontend.layouts.partials.messages')
        @yield('content')
      </div>
    </section>
    <!--/#main-slider-->
    @include('frontend.layouts.partials.footer')
    <!--/#footer-->
    @include('frontend.layouts.partials.jquery')
  </body>
</html>
