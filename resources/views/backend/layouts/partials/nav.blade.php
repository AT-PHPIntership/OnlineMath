<!--/.top-bar-->
<nav class="navbar navbar-inverse" role="banner">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">
        <img src="{{asset('images/logo.png')}}" alt="logo">
      </a>
    </div>
    <div class="collapse navbar-collapse navbar-right">
      <ul class="nav navbar-nav">
        <li class="active">
          <a href="#">@lang('backend.common.menuhome')
          </a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('backend.common.menuuser')
            <i class="fa fa-angle-down">
            </i>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="#">@lang('backend.common.submenu.createuser')
              </a>
            </li>
            <li>
              <a href="#">@lang('backend.common.submenu.indexuser')
              </a>
            </li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('backend.common.menulesson')
            <i class="fa fa-angle-down">
            </i>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="#">@lang('backend.common.submenu.createlesson')
              </a>
            </li>
            <li>
              <a href="#">@lang('backend.common.submenu.indexlesson')
              </a>
            </li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('backend.common.menutest')
            <i class="fa fa-angle-down">
            </i>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="#">@lang('backend.common.submenu.createtest')
              </a>
            </li>
            <li>
              <a href="#">@lang('backend.common.submenu.indextest')
              </a>
            </li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('backend.common.menubook')
            <i class="fa fa-angle-down">
            </i>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="#">@lang('backend.common.submenu.createbook')
              </a>
            </li>
            <li>
              <a href="#">@lang('backend.common.submenu.indexbook')
              </a>
            </li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('backend.common.menutop')
            <i class="fa fa-angle-down">
            </i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--/nav-->
