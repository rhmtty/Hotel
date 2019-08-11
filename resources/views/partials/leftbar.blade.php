<div class="left_col scroll-view">
  <div class="navbar nav_title" style="border: 0;">
    <a href="{{url('/admin')}}" class="site_title"><i class="fa fa-building"></i> <span>Hotel Merakyat</span></a>
  </div>

  <div class="clearfix"></div>

  <!-- menu profile quick info -->
  <div class="profile clearfix">
    <div class="profile_pic">
    @if(Auth::user()->jenis_kelamin=="male")
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
        <li><a href="/admin"><i class="fa fa-home"></i> Home <span></span></a>
        </li>
        <li><a><i class="fa fa-bed"></i> Kamar <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{url('/admin/kamar/form')}}">Tambah Kamar</a></li>
            <li><a href="{{url('/admin/kamar')}}">List Kamar</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-inbox"></i> Lantai <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{url('/admin/lantai/form')}}">Tambah Lantai</a></li>
            <li><a href="{{url('/admin/lantai')}}">List Lantai</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-table"></i> Tipe Kamar <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{url('/admin/tipe-kamar/form')}}">Tambah Tipe Kamar</a></li>
            <li><a href="{{url('/admin/tipe-kamar')}}">List Tipe Kamar</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-building"></i>Blok <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{url('/admin/blok/form')}}">Tambah Blok</a></li>
            <li><a href="{{url('/admin/blok')}}">List Blok</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-book"></i>Booking<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{url('/admin/booking/form')}}">Pesan Kamar</a></li>
            <li><a href="{{url('/admin/booking')}}">List Booking</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-user"></i>Karyawan <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{url('/admin/karyawan/form')}}">Tambah Karyawan</a></li>
            <li><a href="{{url('/admin/karyawan')}}">List Karyawan</a></li>
          </ul>
        </li>
        
      </ul>
    </div>
  </div>
  <!-- /sidebar menu -->

  <!-- /menu footer buttons -->
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
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
  </div>
  <!-- /menu footer buttons -->
</div>