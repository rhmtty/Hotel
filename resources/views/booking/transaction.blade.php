@extends('template')
@section('title')
    Invoice
@endsection

@section('content')
    <div class="page-title">
        <div class="title_left">
            <ul class="breadcrumb">
                <li><a href="/admin"><h3>Home</h3></a></li>
                <li><span>Invoice</span></li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
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

                    <div class="invoice-total">
                        <p>Invoice total</p>
                        <h3>Rp.{{ number_format($trx->amount) }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection