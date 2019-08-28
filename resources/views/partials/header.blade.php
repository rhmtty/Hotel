<div class="nav_menu">
  <nav>
    <div class="nav toggle">
      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>

    <ul class="nav navbar-nav navbar-right">
      <li class="">
        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        @if(Auth::user()->jenis_kelamin == "perempuan")
          <img src="{{url('assets/images/female.jpg')}}" alt="">{{ Auth::user()->fullname }}
        @else
          <img src="{{url('assets/images/male.jpg')}}" alt="">{{ Auth::user()->fullname }}
        @endif
          <span class=" fa fa-angle-down"></span>
        </a>
        <ul class="dropdown-menu dropdown-usermenu pull-right">
          <li><a href="/admin/karyawan/profile/{{ Auth::user()->id }}"> Profile</a></li>
          <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            
          </li>
        </ul>
      </li>
    </ul>
  </nav>
</div>