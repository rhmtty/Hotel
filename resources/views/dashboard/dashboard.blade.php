@extends('template')
@section('title')
    Home
@stop
@section('content')
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
            <div class="count">2500</div>
            <span class="count_bottom"><i class="green">4% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
            <div class="count">123.50</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
            <div class="count green">2,500</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
            <div class="count">4,567</div>
            <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
            <div class="count">2,315</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
            <div class="count">7,325</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
        </div>
    </div>
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
                                    @foreach(App\Kamar::dataKamar() as $data)
                                        <option value="{{$data->id}}">{{$data->no_kamar}} - {{$data->tipe}} - {{$data->harga}} </option>
                                    @endforeach
                                </select>
                                <span></span>
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Cek in</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control col-md-7 col-xs-12" id="single_cal1" aria-describedby="inputSuccess2Status" name="checkin">
                            <span aria-hidden="true"><i class="fa fa-calendar-o form-control-feedback right" ></i></span>
                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>                          
                        </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Cek out</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control col-md-7 col-xs-12" id="single_cal2" aria-describedby="inputSuccess2Status" name="checkout">
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