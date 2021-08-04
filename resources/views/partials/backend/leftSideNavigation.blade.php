<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ isActiveMenu('/') }}">
                <a href="{{ url('/') }}">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ isActiveMenu(['enquiries','enquiries/create']) }}">
                <a href="#">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>E</b></span>
                    <span class="pcoded-mtext">Enquiries</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ isActiveMenu('estimates') }}">
                <a href="#">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>E</b></span>
                    <span class="pcoded-mtext">Estimates</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ isActiveMenu('jobs') }}">
                <a href="#">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>J</b></span>
                    <span class="pcoded-mtext">Job List</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ isActiveMenu('allocations') }}">
                <a href="#">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>A</b></span>
                    <span class="pcoded-mtext">Allocations</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ isActiveMenu('operatives') }}">
                <a href="#">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>O</b></span>
                    <span class="pcoded-mtext">Operatives</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ isActiveMenu('invoices') }}">
                <a href="#">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>O</b></span>
                    <span class="pcoded-mtext">Invoices</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ isActiveMenu('clients-and-contacts') }}">
                <a href="{{ route('clients-and-contacts.index') }}">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>O</b></span>
                    <span class="pcoded-mtext">Clients-Contacts</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ isActiveMenu('maintenance') }} pcoded-hasmenu">
                <a href="#">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>M</b></span>
                    <span class="pcoded-mtext">Maintenance</span>
                    <span class="pcoded-mcaret"></span>
                </a>
              <ul class="pcoded-submenu">
                <li class="">
                  <a href="">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>P</b></span>
                    <span class="pcoded-mtext">Place of Work</span>
                    <span class="pcoded-mcaret"></span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="{{ isActiveMenu('logout') }}">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>L</b></span>
                    <span class="pcoded-mtext">{{ __('Logout') }}</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </div>
</nav>
