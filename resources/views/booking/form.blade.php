@extends('template')
@section('title')
  Booking
@stop
@section('content')
    <div class="page-title">
        <div class="title_left">
            <ul class="breadcrumb">
                <li><a href="/admin"><h3>Home</h3></a></li>
                <li><span>Booking</span></li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <!-- form input mask -->
        <div class="col-md-6 col-sm-12 col-xs-12">
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
                    <form class="form-horizontal form-label-left" action="{{url('/admin/booking/save')}}">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Pelanggan</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select name="name" id="" class="form-control col-md-7 col-xs-12">
                                    <option value="">--- PILIH PELANGGAN ---</option>
                                </select>
                                <span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Kamar</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select name="kamar" id="" class="form-control col-md-7 col-xs-12">
                                    <option value="">--- PILIH KAMAR ---</option>
                                </select>
                                <span></span>
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Cek in</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control col-md-7 col-xs-12" id="single_cal1" aria-describedby="inputSuccess2Status">
                            <span aria-hidden="true"><i class="fa fa-calendar-o form-control-feedback right" ></i></span>
                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>                          
                        </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Cek out</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control col-md-7 col-xs-12" id="single_cal2" aria-describedby="inputSuccess2Status">
                            <span aria-hidden="true"><i class="fa fa-calendar-o form-control-feedback right" ></i></span>
                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>                           
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Total</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" name="total">
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
        <!-- /form input mask -->

        <!-- form color picker -->
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Data Pelanggan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" action="{{url('/admin/pelanggan/save')}}">
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
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="btn btn-warning" class="btn btn-primary">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop