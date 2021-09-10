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
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Check Out</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" action="{{url('/booking/check-out/post/'.$booking->id)}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label class="col-md-2" for="">Nama Pelanggan: </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <span class="demo1">{{$booking->nama_pelanggan}}</span>      
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2" for="">No Identitas: </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <span class="demo1">{{$booking->ktp_pelanggan}}</span>      
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2" for="">No Telp: </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <span class="demo1">{{$booking->telp_pelanggan}}</span>      
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2" for="">Alamat: </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <span class="demo1">{{$booking->alamat_pelanggan}}</span>      
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2" for="">Kamar: </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <span class="demo1">No. {{$booking->nomer_kamar}} - {{$booking->tipe_kamar}} - {{$booking->harga_kamar}}</span>      
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2" for="">Cek In: </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <span class="demo1">{{date('d-m-Y', strtotime($booking->checkin_time))}}</span>      
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2" for="">Cek Out: </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <span class="demo1">{{date('d-m-Y', strtotime($booking->checkout_time))}}</span> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2" for="">Lama Menginap: </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <span class="demo1">{{$booking->lama_menginap}} Hari</span> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2" for="">Total Tagihan: </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <span class="demo1">Rp. {{ number_format($booking->total,2)}}</span> 
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-10">
                                <button type="button" class="btn btn-primary" onclick="history.back()">Cancel</button>
                                <button type="submit" class="btn btn-success" {{$booking->active == 0 ? 'disabled' : ''}}>Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /form input mask -->
    </div>
@stop