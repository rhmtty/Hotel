@extends('template')
@section('title')
  Blok
@stop
@section('content')
  <div class="page-title">
      <div class="title_left">
          <ul class="breadcrumb">
              <li><a href="/admin"><h3>Home</h3></a></li>
              <li>Blok</li>
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
          @elseif(session('hapus'))
          <div class="alert alert-success" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Tutup</span></button>
              <span class="badge">Sukses! </span> {{session('hapus')}}
          </div>
        @endif
    </div>
    <br/>
    <div class="col-md-12">
    @if($blok->count()>0)
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th width="4%">No</th>
            <th>Nama Blok</th>
            <th>Deskripsi</th>
            <th width="5%"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($blok as $no => $data)
          <tr>
            <td>{{ $no+1 }}</td>
            <td>{{ $data->nama_blok }}</td>
            <td>{{ $data->deskripsi }}</td>
            <td>
              <a href="{{ url('/admin/blok/edit/'.$data->id) }}"><i class="fa fa-pencil"></i></a>
              <button class="del-button" data-blokid="{{$data->id}}" nama-blok="{{$data->nama_blok}}"><i class="fa fa-eraser"></i></button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
<!-- DELETE CONFIRMATION -->
    <div id="blokDelete" class="modal fade delete-modal-md text-danger" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <form action="{{ route('blok.delete') }}" id="deleteForm" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-header bg-danger">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Hapus Blok</h4>
            </div>
            <div class="modal-body">
              <center><p>Apakah anda yakin mau menghapus blok ini ? Apabila dihapus data tidak bisa dikembalikan!!</p></center>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="blok_id">
                <input type="hidden" name="nama" id="nama_blok">
                
                <button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
              </div>
            </div>
        </form>
        </div>
      </div>
    </div>
<!-- END MODAL DELETE  -->
    @else
      <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Tutup</span></button>
        <strong class="badge">Kosong!!</strong>Data kamar tidak ada. Silahkan ditambahkan.
      </div>
    @endif
  </div>
@stop
