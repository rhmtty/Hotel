@extends('template')
@section('content')

<div class="right_col" role="main">
<div class="">
<div class="page-title">
    <div class="title_left">
    <h3>Form Tambah Tipe Kamar</h3>
    </div>

    
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
        <h2><strong>Tambah</strong><small><span>Tipe Kamar</span></small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li class="dropdown"></li>
            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
        </ul>
        <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <br />
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{url('/admin/tipe-kamar/save')}}" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tipe Kamar<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="last-name" name="tipe_kamar" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="last-name" name="harga" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Deskripsi <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="textarea" required="required" name="deskripsi" class="form-control col-md-7 col-xs-12"></textarea>
              </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button class="btn btn-danger" type="button">Cancel</button>
                <button class="btn btn-primary" type="reset">Reset</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            </div>

        </form>
        </div>
    </div>
    </div>
</div>
@stop