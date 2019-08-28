@extends('template')
@section('title')
  Kamar
@stop
@section('content')
  <div class="page-title">
      <div class="title_left">
          <ul class="breadcrumb">
              <li><a href="/admin"><h3>Kamar</h3></a></li>
              <li><span>Keterangan</span></li>
              <button class="btn btn-info  btn-xs">Tersedia</button>
              <button class="btn btn-danger btn-xs">Tidak Tersedia</button>
          </ul>
      </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="panel-footer">
        @if(session('hapus'))
        <div class="alert alert-info" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Tutup</span></button>
            <span class="badge">Sukses! </span> {{session('hapus')}}
        </div>
        @endif
    </div>
  @if($kamar->count()>0)
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th>No Kamar</th>
            <th>Lantai</th>
            <th>Blok</th>
            <th>Tipe</th>
            <th>Fasilitas</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($kamar as $data)
          <tr class="{{$data->active == 1 ? 'table-success' : 'table-danger'}}" >
            <td>{{ $data->no_kamar }}</td>
            <td>{{ $data->lantai }}</td>
            <td>{{ $data->nama_blok }}</td>
            <td>{{ $data->tipe }}</td>
            <td>{{ $data->fasilitas }}</td>
            <td>{{ $data->active ==1 ? 'Tersedia' : 'Tidak Tersedia' }}</td>
            <td>
              <a href="{{ url('/admin/kamar/edit/'.$data->id) }}"><i class="fa fa-pencil" title="Edit"></i></a>
              <button type="button" class="del-button" data-toggle="modal" data-target=".delete-kamar"><i class="fa fa-eraser" title="Delete"></i></button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <div class="col-md-12">
      <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Tutup</span></button>
        <strong class="badge">Kosong!!</strong>Data kamar tidak ada. Silahkan ditambahkan.
      </div>
    </div>
  @endif
  </div>
    <div class="modal fade delete-kamar" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Hapus kamar</h4>
          </div>
          <div class="modal-body">
            <p>Apakah kamu yakin mau menghapus kamar ini ?</p>
          </div>
          <div class="modal-footer">
            <form action="{{ url('/admin/kamar/delete') }}" method="post" style="display: inline-block;">
              @csrf
              @method('DELETE')
              <input type="hidden" name="id" value="{{ $data->id }}">
              <input type="hidden" name="nama" value="{{ $data->no_kamar }}">

              <button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-danger">Ya</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
