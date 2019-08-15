@extends('template')
@section('title')
  Blok
@stop
@section('content')
  <div class="page-title">
      <div class="title_left">
          <ul class="breadcrumb">
              <li><a href="/admin"><h3>Home</h3></a></li>
              <li>Lantai</li>
          </ul>
      </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="panel-footer">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Tutup</span></button>
                <strong>Sukses! </strong> {{session('success')}}
            </div>
        @endif
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
      @foreach($blok as $result)
      <div class="x_panel tile fixed_height_320">
        <div class="x_title">
          <h2>No </h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="/admin/blok/edit/{{ $result->id }}" role="button" aria-expanded="false"><i class="fa fa-pencil"></i></a></li>
            <li><a href="/admin/blok/delete" role="button" aria-expanded="false"><i class="fa fa-eraser"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <h1>{{ $result->nama_blok }}</h1>
          <h4>{{ $result->deskripsi }}</h4>
        </div>
      </div>
      @endforeach
    </div>
  </div>
@stop
