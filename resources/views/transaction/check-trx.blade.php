@extends('template')
@section('title')
    Check transaction
@endsection

@section('content')
    <div class="page-title">
        <div class="title_left">
            <ul class="breadcrumb">
                <li><a href="/"><h3>Home</h3></a></li>
                <li><span>Check Transaction</span></li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
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
                    <form class="form-horizontal form-label-left" action="{{ url('/transaction/payment/check-trx') }}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Username Akun LinkQu</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="demo1 form-control" name="username" value=""/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Invoice</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="demo1 form-control" name="invoice" value=""/>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <button type="submit" class="btn btn-success col-sm-2 col-md-offset-10">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection