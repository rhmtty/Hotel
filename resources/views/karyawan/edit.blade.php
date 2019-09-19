@extends('template')
@section('title')
    Edit Karyawan
@stop
@section('content')
    <div class="page-title">
        <div class="title_left">
            <ul class="breadcrumb">
                <li><a href="/admin"><h3>Home</h3></a></li>
                <li>Karyawan</li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel-footer">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Tutup</span></button>
                        <strong>Sukses! </strong> {{session('success')}}
                    </div>
                @endif
            </div>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit<small>Karyawan</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="/admin/lantai/save" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group{{ $errors->has('kode') ? ' has-error' : ''}}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Lengkap <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="kode" required="required" class="form-control col-md-7 col-xs-12" name="nama" value="{{ old('kode') }}">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : ''}}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="kode" required="required" class="form-control col-md-7 col-xs-12" name="email" value="{{ old('nama') }}">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('no_lantai') ? ' has-error' : ''}}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"name="nama">Jenis Kelamin<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="jk" id="" class="form-control col-md-7 col-xs-12">
                                    <option value="">Jenis Kelamin</option>
                                    <option value="1">Level 1</option>
                                    <option value="2">Level 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : ''}}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="alamat" id="textarea" rows="6" class="form-control col-md-7 col-xs-12">{{ old('kode') }}</textarea>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-warning" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop