<div class="top-bar">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-xs-8">
        <div class="social">
          <div class="search">
            <form role="form">
              <input type="text" class="search-form" autocomplete="off" placeholder="Search">
              <i class="fa fa-search">
              </i>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xs-4">
        <div class="top-number">
          {{-- @yield('navbar-menu') --}}
          @if((Auth::check()))
          @include('backend.layouts.partials.usermenu')
          @else
          @include('backend.layouts.partials.guestmenu')
          @endif
        </div>
      </div>
    </div>
  </div>
  <!--/.container-->
</div>
