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
            <td width="7%">
              <?php if(Auth::user()->role == 'Superuser') { ?>
                <a href="{{ url('/admin/karyawan/profile/'.$data->id) }}"><i class="fa fa-pencil"></i></a>
                <button type="button" class="del-button" data-toggle="modal" data-target=".delete-karyawan-md"><i class="fa fa-eraser"></i></button>
              <?php } ?>
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
    <!-- DELETE CONFIRMATION -->
    <div class="modal fade delete-karyawan-md" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Hapus Data Karyawan</h4>
          </div>
          <div class="modal-body">
            <p>Yakin mau menghapus data karyawan ini ? Apabila dihapus data tidak bisa dikembalikan.</p>
          </div>
          <div class="modal-footer">
            <form action="{{ url('/admin/karyawan/delete') }}" method="post" style="display: inline-block;">
              @csrf
              @method('DELETE')
              <input type="hidden" name="id" value="{{ $data->id }}">
              <input type="hidden" name="nama" value="{{ $data->fullname }}">
              
              <button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-danger">Ya</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END MODAL DELETE  -->
  </div>
@stop