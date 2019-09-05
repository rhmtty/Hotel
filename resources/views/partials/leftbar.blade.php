<div class="left_col scroll-view">
  <div class="navbar nav_title" style="border: 0;">
    <a href="{{url('/admin')}}" class="site_title"><i class="fa fa-building"></i> <span>Guest House</span></a>
  </div>

  <div class="clearfix"></div>

  <!-- menu profile quick info -->
  <div class="profile clearfix">
    <div class="profile_pic">
      @if(Auth::user()->jenis_kelamin=="laki-laki")
        <img src="{{url('assets/images/male.jpg')}}" alt="{{ Auth::user()->fullname }}" class="img-circle profile_img">
      @else
        <img src="{{url('assets/images/female.jpg')}}" alt="{{ Auth::user()->fullname }}" class="img-circle profile_img">
      @endif
    </div>
    <div class="profile_info">
      <span>Welcome,</span>
      <h2>{{ Auth::user()->fullname }}</h2>
    </div>
  </div>
  <!-- /menu profile quick info -->

  <br />

  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        <li><a href="/admin"><i class="fa fa-home"></i> Home <span></span></a></li>
        <li><a><i class="fa fa-book"></i>Booking<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{url('/admin/booking/form')}}">Pesan Kamar</a></li>
            <li><a href="{{url('/admin/booking')}}">List Booking</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-building"></i>Blok <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{url('/admin/blok/form')}}">Tambah Blok</a></li>
            <li><a href="{{url('/admin/blok')}}">List Blok</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-bed"></i> Kamar <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{url('/admin/kamar/form')}}">Tambah Kamar</a></li>
            <li><a href="{{url('/admin/kamar')}}">List Kamar</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-user"></i>Karyawan <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{url('/admin/karyawan')}}">List Karyawan</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-list"></i>Laporan <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{url('/admin/laporan/bookings')}}">Laporan Booking</a></li>
            <li><a target="_blank" href="{{url('/admin/laporan/pelanggan')}}">Laporan Data Pelanggan</a></li>
            <li><a href="{{url('/admin/laporan/aktifitas')}}">Laporan Aktivitas</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- /sidebar menu -->

  <!-- menu footer buttons -->
  <div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
      <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
      <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="#" data-target="#log-out">
      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
  </div>
  <!-- /menu footer buttons -->
</div>
<!-- MESSAGE BOX-->
  <div class="modal" tabindex="-1" role="dialog" id="log-out">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><strong>Log </strong>Out ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin ingin keluar?</p>
        </div>
        <div class="modal-footer">
          <a href="{{ route('logout') }}" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        </div>
      </div>
    </div>
  </div>
<!-- END MESSAGE BOX-->
