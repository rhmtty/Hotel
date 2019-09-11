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
          <li><a href="#" id="log-out" data-target="#ModalLogout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
</div>
<div id="ModalLogout" class="modal fade text-danger" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
      <div class="modal-content" style="border-radius: 0px;">
          <div class="modal-header bg-danger" style="padding: 0px 10px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <p>Log Out</p>
          </div>
          <div class="modal-body" style="min-height: 80px;">
            <div class="alert alert-primary" style="padding: 1px 5px;border-radius: 0px;">
              <center> <p>Apakah anda yakin ingin keluar?</p></center>
            </div>
          </div>
          <div class="modal-footer">
            <a href="{{ route('logout') }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Log Out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
          </div>
      </div>
  </div>
</div>