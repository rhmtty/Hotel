@extends('template')
@section('title')
  Blok
@stop
@section('content')
  <div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="x_panel tile fixed_height_320">
        <div class="x_title">
          <h2>No </h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" role="button" aria-expanded="false"><i class="fa fa-pencil"></i></a>
            </li>
            <li><a href="#" role="button" aria-expanded="false"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <h1>Nama Blok</h1>
          <h4>Deskripsi</h4>
        </div>
      </div>
    </div>
  </div>
@stop
