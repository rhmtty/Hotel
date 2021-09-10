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
        @if(session('success'))
            <div class="alert alert-info" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Tutup</span></button>
                <span class="badge">Sukses! </span> {{session('success')}}
            </div>
        @endif
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
                    <form class="form-horizontal form-label-left" action="{{url('/booking/book')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pelanggan</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="demo1 form-control" name="nama" value="{{old('nama')}}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">No Identitas</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control demo colorpicker-element" data-horizontal="true" id="demo_forceformat" name="no_ktp" value="{{old('no_ktp')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">No telp</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control demo colorpicker-element" id="demo_forceformat3" name="notelp" value="{{old('notelp')}}">
                            </div>
                        </div>
                        <div class="form form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Alamat <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea id="textarea" required="required" name="alamat" class="form-control col-md-7 col-xs-12">{{old('alamat')}}</textarea>
                            </div>
                        </div>
                        <!-- FORM BOOKING -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Kamar</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select name="kamar" id="" class="form-control col-md-7 col-xs-12">
                                    <option value="">--- PILIH KAMAR ---</option>
                                    @foreach(App\Kamar::BookingKamar() as $data)
                                        <option value="{{$data->id}}" {{ (old('kamar') == $data->id) ? 'selected' : ''}}>No. {{$data->no_kamar}} - {{$data->tipe}} - {{$data->harga}} </option>
                                    @endforeach
                                </select>
                                <span></span>
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Cek in</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control col-md-7 col-xs-12" id="datepicker-start" aria-describedby="inputSuccess2Status" name="checkin" value="{{old('checkin')}}">
                            <span aria-hidden="true"><i class="fa fa-calendar-o form-control-feedback right" ></i></span>
                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>                          
                        </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Cek out</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control col-md-7 col-xs-12" id="datepicker-end" aria-describedby="inputSuccess2Status" name="checkout" value="{{old('checkout')}}">
                            <span aria-hidden="true"><i class="fa fa-calendar-o form-control-feedback right" ></i></span>
                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>                           
                        </div>

                        <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Pembayaran Bank</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <select name="pembayaranBank" id="" class="form-control col-md-7 col-xs-12">
                                            <option value="">--- PILIH BANK ---</option>
                                            @foreach($data_bank as $data)
                                                <option value={{ $data['id'] }} {{ (old('pembayaran') == $data['id']) ? 'selected' : ''}}>{{ $data['kodeBank'] }} - {{ $data['namaBank'] }}</option>
                                            @endforeach
                                        </select>
                                        <span></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Pembayaran Emoney</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <select name="pembayaranEmoney" id="" class="form-control col-md-7 col-xs-12">
                                            <option value="">--- PILIH EMONEY ---</option>
                                            @foreach($data_emoney['dataproduk'] as $data)
                                                <option value={{ $data['kodebank'] }} {{ (old('pembayaranEmoney') == $data['kodebank']) ? 'selected' : ''}}>{{ $data['kodebank'] }} - {{ $data['namaproduk'] }}</option>
                                            @endforeach
                                        </select>
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
    </div>
@stop