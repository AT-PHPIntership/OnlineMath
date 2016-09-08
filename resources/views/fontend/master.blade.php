<!DOCTYPE html>
<html lang="en">
  <head>
    @include('frontend.layouts.partials.header')
  </head>
  <body>
      @include('frontend.layouts.partials.sitemaptop')
    <div id="body">
      <!-- search module -->
      @include('frontend.layouts.partials.search')
      <!-- end search module -->
      @include('frontend.layouts.partials.menu')
      <!-- #main-menu-->
      <div class="content_page">
        @include('frontend.layouts.partials.colnav')
        <!-- .colnav -->
        <div class="content_main">
            @yield('content')
        </div>
        <!-- content_main -->
      </div>
    </div>
    @include('frontend.layouts.partials.footer')
    @include('frontend.layouts.partials.jquery')
    <!-- #body-->
  </body>
</html>
