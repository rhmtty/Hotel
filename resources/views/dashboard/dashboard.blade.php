@extends('template')
@section('title')
    Home
@stop
@section('content')
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-bed"></i> Kamar Tersedia </span>
            <div class="count">{{\App\Kamar::where('active', 1)->count()}}</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>{{Carbon\Carbon::today()->format('D, d M Y')}}</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-book"></i> Total Booking</span>
            <div class="count green">{{\App\Booking::where('active', 1)->count()}}</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>{{Carbon\Carbon::today()->format('D, d M Y')}}</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <iframe src="http://free.timeanddate.com/clock/i6xgpsj4/n552/tlid38/fn3/fs16/fc444/tct/pct/ftb/tt0/ts1/tb4" frameborder="0" width="175" height="65" allowTransparency="true"></iframe>
      </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Tutup</span></button>
            <span class="badge">Sukses! </span> {{session('success')}}
        </div>
    @endif
    <!-- /top tiles -->
        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".bs-example-modal-lg">Booking Kamar</button>

              <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">


            <div class="row">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <img src="{{asset('images/logo_corpu.png')}}" width="55%" style="display: block; margin-left: auto; margin-right: auto;">
                </div>
            </div>
        </div>

        <!-- form input mask -->
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Booking</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" action="{{url('/admin/booking/book')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pelanggan</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="demo1 form-control" name="nama" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">No Identitas</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control demo colorpicker-element" data-horizontal="true" id="demo_forceformat" name="no_ktp" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">No telp</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control demo colorpicker-element" id="demo_forceformat3" name="notelp" value="">
                            </div>
                        </div>
                        <div class="form form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Alamat <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea id="textarea" required="required" name="alamat" class="form-control col-md-7 col-xs-12"></textarea>
                            </div>
                        </div>
                        <!-- FORM BOOKING -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Kamar</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select name="kamar" id="" class="form-control col-md-7 col-xs-12">
                                    <option value="">--- PILIH KAMAR ---</option>
                                    @foreach(App\Kamar::BookingKamar() as $data)
                                        <option value="{{$data->id}}">{{$data->no_kamar}} - {{$data->tipe}} - {{$data->harga}} </option>
                                    @endforeach
                                </select>
                                <span></span>
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Cek in</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="date" class="form-control col-md-7 col-xs-12" id="" aria-describedby="inputSuccess2Status" name="checkin">
                            <span aria-hidden="true"><i class="fa fa-calendar-o form-control-feedback right" ></i></span>
                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>                          
                        </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Cek out</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="date" class="form-control col-md-7 col-xs-12" id="" aria-describedby="inputSuccess2Status" name="checkout">
                            <span aria-hidden="true"><i class="fa fa-calendar-o form-control-feedback right" ></i></span>
                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>                           
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Keterangan</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" name="keterangan" placeholder="Contoh: (Order via traveloka)">
                                <span></span>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     <div class="modal-footer">
    </div>
  </div>
</div>
</div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <img src="{{asset('images/logo_corpu.png')}}" width="55%" style="display: block; margin-left: auto; margin-right: auto;">
        </div>
    </div>
</div>
@stop