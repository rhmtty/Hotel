@extends('template')
@section('content')
  <div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
    @foreach($lantai as $rs)
      <div class="x_panel tile fixed_height_320">
          <div class="x_title">
              <h2>{{$rs->kode_lantai}}</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><i class="fa fa-pencil" title="Edit"><span>  Edit</span></i></a></li>
                    <li><a href="#"><i class="fa fa-trash" title="Hapus"><span>  Hapus</span></i></a></li>
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
              <strong>Nama Lantai:</strong>
            </div>
            <div class="w_center w_25">
              <div class="">
                <div class="">
                  <span class="">{{$rs->nama_lantai}}</span>
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
    @endforeach
    </div>
  </div>

@stop
