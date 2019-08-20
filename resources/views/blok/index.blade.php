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
          <div class="alert alert-info" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Tutup</span></button>
              <span class="badge">Sukses! </span> {{session('success')}}
          </div>
          @elseif(session('hapus'))
          <div class="alert alert-success" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Tutup</span></button>
              <span class="badge">Sukses! </span> {{session('hapus')}}
          </div>
        @endif
    </div>
    @foreach($blok as $result)
    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="x_panel xpanel-info tile fixed_height_320">
        <div class="x_title">
          <strong class="badge"></strong>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li class="dropdown">
              <a href="/admin/blok/edit/{{ $result->id }}" role="button" aria-expanded="false"><i class="fa fa-pencil"></i></a>
            </li>
            <li>
              <form action="{{ url('/admin/blok/delete') }}" method="post" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $result->id }}">
                <input type="hidden" name="nama" value="{{ $result->nama_blok }}">
                <button type="submit" class=""><i class="fa fa-eraser"></i></button>
              </form>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <h1>{{ $result->nama_blok }}</h1>
          <h4>{{ $result->deskripsi }}</h4>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@stop
