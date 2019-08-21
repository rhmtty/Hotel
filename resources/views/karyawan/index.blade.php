@extends('template')
@section('title')
  Karyawan
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
  @if($karyawans->count()>0)
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Jenis Kelamin</th>
            <th>Telpon</th>
            <th>Alamat</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($karyawans as $data)
          <tr>
            <td>{{ $data->fullname }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->jenis_kelamin }}</td>
            <td>{{ $data->telp }}</td>
            <td>{{ $data->alamat }}</td>
            <td>
              <a href="{{ url('/admin/karyawan/edit/'.$data->id) }}"><i class="fa fa-pencil"></i></a>
              <form action="{{ url('/admin/karyawan/delete') }}" method="post" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $data->id }}">
                <button type="submit" class=""><i class="fa fa-eraser"></i></button>
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
        <strong class="badge">Kosong!!</strong>Data karyawan tidak ada. Silahkan ditambahkan.
      </div>
    </div>
  @endif
  </div>
@stop