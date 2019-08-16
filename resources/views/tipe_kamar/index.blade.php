@extends('template')
@section('title')
    Tipe Kamar
@stop
@section('content')
  <div class="page-title">
      <div class="title_left">
          <ul class="breadcrumb">
              <li><a href="/admin"><h3>Home</h3></a></li>
              <li>Tipe Kamar</li>
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
        @elseif(session('delete'))
          <div class="alert alert-success" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Tutup</span></button>
              <strong>Sukses! </strong> {{session('delete')}}
          </div>
        @endif
    </div>
  @foreach($tipe_kamar as $rs)
  <div class="col-md-4">
      <div class="x_panel tile fixed_height_320">
          <div class="x_title">
              <h2>{{$rs->tipe_kamar}}</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/admin/tipe-kamar/edit/'. $rs->id) }}"><i class="fa fa-pencil" title="Edit"><span>  Edit</span></i></a></li>
                    <li><a href="{{ url('/admin/tipe-kamar/delete/'. $rs->id) }}"><i class="fa fa-trash" title="Hapus"><span>  Hapus</span></i></a></li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
            <div class="clearfix"></div>
          </div>
        <div class="x_content">
          <div class="widget_summary">
            <div class="w_left w_30" style="width:30%">
              <strong>Harga:</strong>
            </div>
            <div class="w_center w_25">
              <div class="">
                <div class="">
                  <span class="">{{$rs->harga}}</span>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </div><br/>
          <div class="widget_summary">
            <div class="w_left w_30" style="width:30%">
              <strong>Deskripsi:</strong>
            </div>
            <div class="w_center w_25" style="width:40%">
              <div class="">
                <div class="">
                  <span class="">{{$rs->deskripsi}}</span>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
  </div>
  @endforeach
</div>
@stop
