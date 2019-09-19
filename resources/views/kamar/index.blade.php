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
  <div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
    <form action="{{ url('/admin/kamar/cari')}}" method="get">
      <div class="input-group">
        <input type="text" class="form-control"  name="cari" placeholder="Cari Data Kamar....."value="">
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit">Cari</button>
        </span>
      </div>
    </form>
    </div>
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
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>No Kamar</th>
            <th>Lantai</th>
            <th>Blok</th>
            <th>Tipe</th>
            <th>Fasilitas</th>
            <th>Harga</th>
            <th>Status</th>
            <th width="5%"></th>
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
            <td>Rp. {{ number_format($data->harga). ',-' }}</td>
            <td>{{ $data->active ==1 ? 'Tersedia' : 'Tidak Tersedia' }}</td>
            <td>
              <a href="{{ url('/admin/kamar/edit/'.$data->id) }}"><i class="fa fa-pencil" title="Edit"></i></a>
              <button type="button" class="del-button" data-idKamar="{{$data->id}}" no-kamar="{{$data->no_kamar}}"><i class="fa fa-eraser" title="Delete"></i></button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
<!-- DELETE CONFIRMATION -->
    <div id="kamarDelete" class="modal fade delete-modal-md text-danger" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <form action="{{ route('kamar.delete') }}" id="deleteForm" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-header bg-danger">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Hapus Kamar?</h4>
            </div>
            <div class="modal-body">
              <center><p>Apakah anda yakin mau menghapus kamar ini ? Apabila dihapus data tidak bisa dikembalikan!!</p></center>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="id_kamar">
                <input type="hidden" name="no_kamar" id="no_kamar">
                
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
    <div class="col-md-12">
      <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Tutup</span></button>
        <strong class="badge">Kosong!!</strong>Data kamar tidak ada. Silahkan ditambahkan.
      </div>
    </div>
  @endif
  </div>
@stop
