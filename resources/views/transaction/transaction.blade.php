@extends('template')
@section('title')
    Invoice
@endsection

@section('content')
    <div class="page-title">
        <div class="title_left">
            <ul class="breadcrumb">
                <li><a href="/"><h3>Home</h3></a></li>
                <li><span>Invoice</span></li>
            </ul>
        </div>

        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <form action="{{ url('/transaction/pesanan-saya/') }}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control"  name="search_customer_trx" placeholder="Cari data transaksi. . . ." value="{{ old('search-customer-transaction') }}">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Cari</button>
                    </span>
                </div>
            </form>
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
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>INVOICE</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                @if(isset($trx) && $trx->count() > 0)
                    <strong>Invoice number</strong>
                    <p>{{ $trx->invoice }}</p>
                    <strong>Date of issue</strong>
                    <p>{{ date('d/m/Y', strtotime($trx->created_at)) }}</p>
                    <div class="bill-wrapper">
                        <strong>Billed to</strong>
                        <p>{{ $trx->nama_pelanggan }}</p>
                        <p>{{ $trx->alamat_pelanggan }}</p>
                        <p>{{ $trx->customer_email }}</p>
                        <p>{{ $trx->customer_phone }}</p>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 70em">Description</th>
                                <th>Unit cost</th>
                                <th>Day</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Kamar no. {{ $trx->nomer_kamar }} - Tipe {{ $trx->tipe_kamar }}</td>
                                <td>Rp.{{ number_format($trx->harga) }}</td>
                                <td>{{ $trx->lama_menginap }}</td>
                                <td>Rp.{{ number_format($trx->amount) }}</td>
                            </tr>
                        </tbody>
                        <tbody><tr></tr></tbody>
                    </table>

                    <div class="invoice-total col-sm-12">
                        <p>Invoice total</p>
                        <h3>Rp.{{ number_format($trx->amount) }}</h3>
                    </div>

                    <div class="payment-proccess">
                        <a href="{{ url('/transaction/payment/'.$trx->invoice) }}" class="btn btn-success">Proses Pembayaran</a>
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Tutup</span></button>
                        <strong class="badge">Silahkan cari data booking menggunakan nomor invoice!!</strong>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection