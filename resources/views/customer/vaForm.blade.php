@extends('template')
@section('title')
  Virtual Account
@stop
@section('content')
    <div class="page-title">
        <div class="title_left">
            <ul class="breadcrumb">
                <li><a href="/admin"><h3>Home</h3></a></li>
                <li><span>Virtual Account</span></li>
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
        @if(session('failed'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Tutup</span></button>
                <span class="badge">Gagal! </span> {{session('failed')}}
            </div>
        @endif
        <!-- form input mask -->
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Create Virtual Account</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" action="{{url('/customer/post/va')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">BANK Code</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select name="bank_code" id="" class="form-control col-md-7 col-xs-12">
                                    <option>--- PILIH KODE BANK ---</option>
                                        <option value="014">Bank BCA</option>
                                        <option value="002">Bank BRI</option>
                                        <option value="022">Bank CIMB</option>
                                        <option value="009">Bank BNI</option>
                                        <option value="008">Bank Mandiri</option>
                                        <option value="523">Bank SAHABAT SAMPOERENA</option>
                                </select>
                                <span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control demo colorpicker-element" id="demo_forceformat3" name="amount" value="{{old('amount')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer Name</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="demo1 form-control" name="customer_name" value="{{old('customer_name')}}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer Email</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control demo colorpicker-element" data-horizontal="true" id="demo_forceformat" name="customer_email" value="{{old('customer_email')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer Phone</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control demo colorpicker-element" id="demo_forceformat3" name="customer_phone" value="{{old('customer_phone')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">PIN</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control demo colorpicker-element" id="demo_forceformat3" name="pin" value="{{old('pin')}}">
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