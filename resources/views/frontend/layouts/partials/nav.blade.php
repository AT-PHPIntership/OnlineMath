<!--/.top-bar-->
<nav class="navbar navbar-inverse" role="banner">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">
        <img src="{{asset('frontend/images/logo.png')}}" alt="logo">
      </a>
    </div>
    <div class="collapse navbar-collapse navbar-right">
      <ul class="nav navbar-nav">
        <li class="active">
          <a href="#">@lang('common.homepage.menuhome')
          </a>
        </li>
        <li>
          <a href="#">@lang('common.homepage.menulesson')
          </a>
        </li>
        <li>
          <a href="#">@lang('common.homepage.menutest')
          </a>
        </li>
        <li>
          <a href="#">@lang('common.homepage.menubook')
          </a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('common.homepage.menugame')
            <i class="fa fa-angle-down">
            </i>
          </a>
        </li>
        <li>
          <a href="#">@lang('common.homepage.menuhelp')
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--/nav-->
