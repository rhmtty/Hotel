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
        <div class="panel-footer">
        @if(session('success'))
          <div class="alert alert-info" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Tutup</span></button>
              <span class="badge">Sukses! </span> {{session('success')}}
          </div>
        @endif
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><strong>Tambah</strong><small><span>Kamar</span></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ url('/admin/kamar/edit/'.$kamar->id) }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No Kamar<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="last-name" name="kamar" required="required" class="form-control col-md-7 col-xs-12" value="{{ $kamar->no_kamar }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Lantai<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="last-name" name="lantai" required="required" class="form-control col-md-7 col-xs-12" value="{{ $kamar->lantai }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Blok<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="blok" id="" class="form-control col-md-7 col-xs-12">
                                @foreach(App\Blok::select('nama_blok', 'id')->get() as $data)
                                    @if($data->id == $kamar->blok_id)
                                    <option value="{{$data->id}}"> {{ $data->nama_blok }}</option>
                                    @else
                                    <option>----- Pilih Blok -----</option>
                                    <option value="{{$data->id}}">{{$data->nama_blok}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe Kamar<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="tipe" id="" class="form-control col-md-7 col-xs-12">
                                    <option value="{{ $kamar->tipe}}">{{ $kamar->tipe}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="last-name" name="harga" required="required" class="form-control col-md-7 col-xs-12" value="{{ $kamar->harga }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Fasilitas <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="textarea" required="required" name="fasilitas" class="form-control col-md-7 col-xs-12">{{ $kamar->no_kamar }}</textarea>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-warning" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop