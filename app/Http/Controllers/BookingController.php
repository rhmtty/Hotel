<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use App\Kamar;
use App\Booking;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $book = Booking::get();
        return view('booking.index', $book);
    }

    public function formNew()
    {
        return view('booking.form');
    }

    public function postNew(Request $request)
    {
        $pelanggan = New Pelanggan();
        $pelanggan->nama = $request->nama;
        $pelanggan->no_ktp = $request->no_ktp;
        $pelanggan->telp = $request->notelp;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->save();

        $tglCekin = new DateTime($request->checkin);
        $tglCekout = new DateTime($request->checkout);
        $jumlah_hari = $tglCekin->diff($tglCekout);
        $hari = ($jumlah_hari->format('%a'));


        $book = New Booking();
        $harga = Kamar::select('harga', $request->kamar);

        $book->id_kamar = $request->kamar;
        $book->id_user = Auth::user()->id;
        $book->id_pelanggan = Pelanggan::select('id', $request->nama);
        $book->checkin_time = $tglCekin;
        $book->checkout_time = $tglCekout;
        $book->total = $hari * $harga->harga;
        $book->lama_menginap = $hari;
        $book->keterangan = $request->keterangan;
        dd($request(all));

    }
}
