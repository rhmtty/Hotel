@extends('template')
@section('title')
    Home
@stop
@section('content')
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-bed"></i> Kamar Tersedia </span>
            <div class="count">{{\App\Kamar::where('active', 1)->count()}}</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>{{Carbon\Carbon::today()->format('D, d M Y')}}</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-book"></i> Total Booking</span>
            <div class="count green">{{\App\Booking::where('active', 1)->count()}}</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>{{Carbon\Carbon::today()->format('D, d M Y')}}</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <iframe src="http://free.timeanddate.com/clock/i6xgpsj4/n552/tlid38/fn3/fs16/fc444/tct/pct/ftb/tt0/ts1/tb4" frameborder="0" width="175" height="65" allowTransparency="true"></iframe>
      </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <img src="{{asset('images/logo_corpu.png')}}" width="55%" style="display: block; margin-left: auto; margin-right: auto;">
        </div>
    </div>
@stop