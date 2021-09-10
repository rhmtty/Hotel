@extends('template')
@section('title')
    Laporan Booking
@stop
@section('content')
    <div class="page-title">
        <div class="title_left">
            <ul class="breadcrumb">
                <li><a href="/admin"><h3>Home</h3></a></li>
                <li><span>Laporan Booking</span></li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <!-- form input mask -->
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Laporan Booking</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Bulan</th>
                                <th width="10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $dt)
                                <tr>
                                    <td>{{date('M-Y', strtotime($dt[0]->created_at))}}</td>
                                    <td><a href="{{ url('/admin/laporan/bookings/view/'.$param) }}" target="_blank"><button class="btn btn-info btn-sm">Lihat</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /form input mask -->
    </div>
@stop