<nav class="navigation-section">
  <div class="container-fluid">
    <div class="nav-desktop">
      <div class="row">
        <div class="col-lg-7">
          <div class="logo-block">
            <a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}"></a>
          </div>
          <div class="menu-block">
            <div class="headcontact">
              <i class="zmdi zmdi-phone-in-talk"></i> +978765432341
            </div>
            <ul class="menu-list">
              <li class="active"><a href="{{ url('/') }}">Home</a></li>
              <li class=""><a href="#">About</a></li>
              <li class=""><a href="#">FAQ's</a></li>
              <li class=""><a href="#">Support</a></li>
              <li class=""><a href="#">Contact</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="logindiv ml-auto">
            @if (Auth::check())
              @include('partials.topUserProfile')
            @else
              @include('partials.topLoginForm')
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="nav-mobile">
      <button type="button" id="sidebarCollapse" class="mob-menu-btn">
        <i class="zmdi zmdi-menu"></i>
      </button>
      <div class="mobile-logo-block">
        <a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}"></a>
      </div>
      @if (Auth::check())
        <div class="mobile-cart-block">
          <a href="#">
            <svg version="1.2" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 35 35" height="35" width="35" class="header-link-icon" xml:space="preserve">
                        <g>
                          <g>
                            <path fill="#134e67" d="M27.5,22.3H11.1c-0.4,0-0.7-0.2-0.9-0.6L4.5,4.4H0V2.6h5.1c0.4,0,0.7,0.2,0.9,0.6l2.2,6.4h23
                                 c0.3,0,0.6,0.1,0.7,0.4c0.2,0.2,0.2,0.5,0.1,0.8l-3.6,10.9C28.2,22.1,27.9,22.3,27.5,22.3z M11.8,20.5h15.1l3-9.1H8.7L11.8,20.5z"></path>
                          </g>
                          <g>
                            <circle fill="#027dc1" cx="13.5" cy="26.7" r="2.2"></circle>
                          </g>
                          <g>
                            <circle fill="#027dc1" cx="25" cy="26.7" r="2.2"></circle>
                          </g>
                        </g>
                     </svg>
            <div class="addedcountcart">2</div>
          </a>
        </div>
        <div class="mobile-login-block">
          <a href="{{ url('/') }}"><i class="zmdi zmdi-account-o"></i></a>
        </div>
      @else
        <div class="mobile-login-block">
          <a href="{{ url('/login') }}"><i class="zmdi zmdi-account-o"></i></a>
        </div>
      @endif
      <div id="sidebar">
        <div id="dismiss">
          <i class="zmdi zmdi-close"></i>
        </div>
        <div class="sidebar-header">
          <h3>{{ config('app.name') }}</h3>
        </div>
        <ul class="list-unstyled components">
          <li class="active"><a href="{{ url('/') }}">Home</a></li>
          <li class=""><a href="#">About</a></li>
          <li class=""><a href="#">FAQ's</a></li>
          <li class=""><a href="#">Support</a></li>
          <li class=""><a href="#">Contact</a></li>
          @if (Auth::check())
            <li class="">
              <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="ti-layout-sidebar-left"></i>{{ __('Logout') }}
              </a>
            </li>
          @endif
        </ul>
      </div>
      <div class="overlay"></div>
    </div>
  </div>
</nav>
