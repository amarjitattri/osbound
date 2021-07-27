<div class="header-links">
  <div class="searchbox">
    <form action="#">
      <div class="group-input">
        <span class="iconsform"><i class="zmdi zmdi-search"></i></span>
        <input type="text" class="form-control" id="email" placeholder="Search..." required>
      </div>
    </form>
  </div>
  <div class="user-menulist">
    <div class="header-link-icon user-icon">
      <img src="{{ asset('images/user-icon.png') }}" alt="{{ Auth::user()->name }}">
    </div>
    <span class="header-link-text">
      <span class="header-link-text-top">My Account</span>
      <span class="header-link-text-bottom">Hello {{ Auth::user()->name }}</span>
    </span>
    <div class="user-menu">
      <ul>
        <li>
          <a href="{{ route('user.profile') }}">Manage Profile</a></li>
        <li>
          <a href="{{ route('user.orders') }}">My Order</a></li>
        <li>
          <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="ti-layout-sidebar-left"></i>{{ __('Logout') }}
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="cartblock">
    <a href="#">
      <svg version="1.2" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 35 35" height="35" width="35" class="header-link-icon" xml:space="preserve"><g>
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
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>
