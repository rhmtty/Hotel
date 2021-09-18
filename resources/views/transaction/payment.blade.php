@extends('template')
@section('title')
    Payment Proccess
@endsection

@section('content')
    <div class="page-title">
        <div class="title_left">
            <ul class="breadcrumb">
                <li><a href="/"><h3>Home</h3></a></li>
                <li><span>Payment Proccess</span></li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        @if(session('success'))
            <div class="alert alert-info" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Tutup</span></button>
                <span class="badge">Sukses! </span> {{ session('success') }}
            </div>
        @endif
        @if(session('failed'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Tutup</span></button>
                <span class="badge">Failed! </span> {{ session('failed') }}
            </div>
        @endif

        @if (isset($trx) && $trx->count() > 0)
        <div class="col-md-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Invoice</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                    
                <div class="x_content">
                    <p><strong>Nomor Invoice :</strong> {{ $trx->invoice }}</p>
                    <p><strong>Nama Pelanggan :</strong> {{ $trx->nama_pelanggan }}</p>
                    <p><strong>Alamat :</strong> {{ $trx->alamat_pelanggan }}</p>
                    <p><strong>No Handphone :</strong> {{ $trx->customer_phone }}</p>
                    <p><strong>Email :</strong> {{ $trx->customer_email }}</p>
                    <p><strong>Total Tagihan :</strong> IDR.{{ number_format($trx->amount) }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Payment</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <form class="form-horizontal form-label-left" action="{{ url('/transaction/payment/' . $trx->invoice) }}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Username Akun LinkQu</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="demo1 form-control" name="username" value="{{old('username')}}"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pin Akun LinkQu</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="demo1 form-control" name="pin" value="{{old('pin')}}"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Rekening Tujuan</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="demo1 form-control" name="accountNumber" value="{{old('accountNumber')}}"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Tagihan</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="demo1 form-control" name="total_tagihan" value="{{ $trx->amount }}" disabled/>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        @if ($trx->active === 1)
                            <button type="submit" class="btn btn-success col-sm-2 col-md-offset-10">Submit</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection