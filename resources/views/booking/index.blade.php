@extends('template')
@section('title')
  Booking
@stop
@section('content')
  <div class="page-title">
      <div class="title_left">
          <ul class="breadcrumb">
              <li><a href="/admin"><h3>Home</h3></a></li>
              <li>Booking</li>
          </ul>
      </div>
    <div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
    <form action="{{ url('/booking/cari')}}" method="get">
      <div class="input-group">
        <input type="text" class="form-control"  name="cari" placeholder="Cari Data Booking. . . ." value="{{ old('cari') }}">
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
  @if(session('success'))
    <div class="alert alert-info" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Tutup</span></button>
        <span class="badge">Sukses! </span> {{session('success')}}
    </div>
  @elseif(session('success-edit'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Tutup</span></button>
        <span class="badge">Sukses! </span> {{session('success-edit')}}
    </div>
  @elseif(session('checkout'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Tutup</span></button>
        <span class="badge">Sukses! </span> {{session('checkout')}}
    </div>
  @endif
    <div class="col-md-12">
    @if(isset($book) && $book->count()>0)
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>Kamar</th>
            <th>Tipe Kamar</th>
            <th>Pelanggan</th>
            <th>Lama Menginap</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Total</th>
            <th>Operator</th>
            <th>Status</th>
            <th width="12%">Aksi</th>
          </tr>
        </thead>
        <tbody>
        @foreach($book as $result)
          <tr class="@if($result->active == 0) table-danger @endif">
            <td>No. {{$result->nomer_kamar}}</td>
            <td>{{$result->tipe_kamar}}</td>
            <td>{{$result->nama_pelanggan}}</td>
            <td>{{$result->lama_menginap}} Hari</td>
            <td>{{date('d-m-Y', strtotime($result->checkin_time))}}</td>
            <td>{{date('d-m-Y', strtotime($result->checkout_time))}}</td>
            <td>Rp.{{ number_format($result->total)}}</td>
            <td>{{$result->operator}}</td>
            <td>{{$result->active == 1 ? 'Check In' : 'Check Out'}}</td>
            <td>
              @if($result->active == 1)
                <a href="{{ url('/booking/edit/'.$result->id) }}"><i class="fa fa-pencil"></i></a>
                <button type="button" class="del-button" data-toggle="modal" data-target=".delete-booking-md"><i class="fa fa-eraser"></i></button>
                <a href="{{url('/booking/check-out/'.$result->id)}}"><button class="btn btn-info btn-sm" style="margin-top: -4px;">Check Out</button></a>
              @endif
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <!-- DELETE CONFIRMATION -->
      <div class="modal fade delete-booking-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Hapus Booking</h4>
            </div>
            <div class="modal-body">
              <p>Yakin mau menghapus data booking ini ? Apabila dihapus data tidak bisa dikembalikan.</p>
            </div>
            <div class="modal-footer">
              <form action="{{ url('/admin/booking/delete') }}" method="post" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $result->id }}">
                <input type="hidden" name="id_kamar" value="{{ $result->id_kamar }}">
                
                <button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-danger">Ya</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END MODAL DELETE  -->
      @else
        <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Tutup</span></button>
          <strong class="badge">Kosong!!</strong>Data Booking tidak ada. Silahkan ditambahkan.
        </div>
      </div>
      @endif
    </div>
@stop