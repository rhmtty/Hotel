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
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th>Kamar</th>
              <th>Pelanggan</th>
              <th>Lama Menginap</th>
              <th>Check In</th>
              <th>Check Out</th>
              <th>Total</th>
              <th>Keterangan</th>
              <th>Operator</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          @foreach($books as $book)
            <tr>
              <td>{{$book->nomer_kamar}}</td>
              <td>{{$book->nama_pelanggan}}</td>
              <td>{{$book->lama_menginap}}</td>
              <td>{{date('d-m-Y', strtotime($book->checkin_time))}}</td>
              <td>{{date('d-m-Y', strtotime($book->checkout_time))}}</td>
              <td>{{$book->total}}</td>
              <td>{{$book->keterangan}}</td>
              <td>{{$book->operator}}</td>
              <td width="20%">
                <a href="{{ url('/admin/booking/edit/'.$book->id) }}"><i class="fa fa-pencil"></i></a>
                <button type="button" class="del-button" data-toggle="modal" data-target=".delete-booking-md"><i class="fa fa-eraser"></i></button>
                <a href="{{url('/admin/booking/check-out/'.$book->id)}}"><button class="btn btn-info btn-sm" style="margin-top: -4px;">Check Out</button></a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
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
                <input type="hidden" name="id" value="{{ $book->id }}">
                <input type="hidden" name="nama" value="{{ $book->nama_blok }}">
                
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