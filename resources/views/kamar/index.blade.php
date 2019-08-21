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
          <tr>
            <td>{{ $data->no_kamar }}</td>
            <td>{{ $data->lantai }}</td>
            <td>{{ $data->nama_blok }}</td>
            <td>{{ $data->tipe }}</td>
            <td>{{ $data->fasilitas }}</td>
            <td>{{ $data->active ==1 ? '<strong style="color: green;">Tersedia</strong>' : '<strong style="color: red;">Tidak Tersedia</strong>' }}</td>
            <td>
              <a href="{{ url('/admin/kamar/edit/'.$data->id) }}"><i class="fa fa-pencil" title="Edit"></i></a>
              <form action="{{ url('/admin/kamar/delete') }}" method="post" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input type="hidden" name="nama" value="{{ $data->no_kamar }}">
                <button type="submit" class=""><i class="fa fa-eraser" title="Delete"></i></button>
              </form>
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
@stop
