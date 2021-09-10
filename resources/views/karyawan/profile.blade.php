@extends('template')
@section('title')
    Profil
@stop
@section('content')
  <div class="">
    <div class="page-title">
        <div class="title_left">
            <ul class="breadcrumb">
                <li><a href="/admin"><h3>Home</h3></a></li>
                <li>Profil Karyawan</li>
            </ul>
        </div>
    </div>
    <!-- <div class="clearfix"></div> -->

    <div class="row">
      <div class="panel-footer">
        @if(session('success'))
          <div class="alert alert-info" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Tutup</span></button>
              <span class="badge">Sukses! </span> {{session('success')}}
          </div>
        @endif
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Profile <small> Karyawan</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
              <div class="profile_img">
                <div id="crop-avatar">
                  <!-- Current avatar -->
                    <img src="{{url('assets/images/avatar.png')}}" class="img-responsive avatar-view" alt="Avatar" title="Change the avatar">
                </div>
              </div>
              <h3>{{ Auth::user()->fullname }}</h3>

              <ul class="list-unstyled user_data">
                <li><i class="fa fa-map-marker user-profile-icon"></i> {{ Auth::user()->alamat }}</li>

                <li>
                  <i class="fa fa-briefcase user-profile-icon"></i> {{ Auth::user()->role }}
                </li>

                <li class="m-top-xs">
                  <i class="fa fa-phone"></i> {{ Auth::user()->telp }}
                </li>
              </ul>

              <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
              <br />
              <!-- start skills -->

              <!-- end of skills -->
            </div>
            <div class="col-md-9 col-sm-n9 col-xs-12">
              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Edit Pofile</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                    <!-- start recent activity -->
                    <div class="messages">
                      <form action="{{url('/admin/karyawan/profile/edit')}}" method="POST">
                      @csrf
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                              <input type="text" class="demo1 form-control" name="nama" value="{{$karyawan->fullname}}" />
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="email" class="demo1 form-control" name="email" value="{{$karyawan->email}}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="password" class="demo1 form-control" name="pass" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select name="jk" id="" class="form-control col-md-7 col-xs-12">
                                  <option value="laki-laki"><i class="fa fa-male"></i>Laki-laki</option>
                                  <option value="perempuan"><i class="fa fa-female"></i>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Telepon</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="demo1 form-control" name="telp" value="{{$karyawan->telp}}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea name="alamat" id="" cols="20" rows="5" class="form-control col-md-7 col-xs-12">{{$karyawan->alamat}}</textarea>
                            </div>
                        </div>
                      @if(Auth::user()->role == 'Superuser') 
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select name="role" id="" class="form-control col-md-7 col-xs-12">
                                  <option value="Superuser">Superuser</option>
                                  <option value="Admin">Admin</option>
                                </select>
                            </div>
                        </div>
                      @endif
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-9 col-md-offset-3">
                              <button type="reset" class="btn btn-primary">Reset</button>
                              <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- end recent activity -->

                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                    <!-- start user projects -->
                    <table class="data table table-striped no-margin">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Project Name</th>
                          <th>Client Company</th>
                          <th class="hidden-phone">Hours Spent</th>
                          <th>Contribution</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>New Company Takeover Review</td>
                          <td>Deveint Inc</td>
                          <td class="hidden-phone">18</td>
                          <td class="vertical-align-mid">
                            <div class="progress">
                              <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>New Partner Contracts Consultanci</td>
                          <td>Deveint Inc</td>
                          <td class="hidden-phone">13</td>
                          <td class="vertical-align-mid">
                            <div class="progress">
                              <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Partners and Inverstors report</td>
                          <td>Deveint Inc</td>
                          <td class="hidden-phone">30</td>
                          <td class="vertical-align-mid">
                            <div class="progress">
                              <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>New Company Takeover Review</td>
                          <td>Deveint Inc</td>
                          <td class="hidden-phone">28</td>
                          <td class="vertical-align-mid">
                            <div class="progress">
                              <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- end user projects -->

                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                    <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                      photo booth letterpress, commodo enim craft beer mlkshk </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
<!-- /page content -->