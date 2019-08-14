@extends('template')
@section('title')
  Kamar
@stop
@section('content')
  <div class="page-title">
      <div class="title_left">
          <ul class="breadcrumb">
              <li><a href="/admin"><h3>Home</h3></a></li>
              <li><span>Kamar</span></li>
          </ul>
      </div>
  </div>
  <div class="clearfix"></div>
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
          <h4>Type Kamar</h4>
          <h4>Deskripsi</h4>
          <h4>Status</h4>
        </div>
      </div>
    </div>
  </div>
@stop
