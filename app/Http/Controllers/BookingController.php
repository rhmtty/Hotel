<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use App\Kamar;
use App\Booking;
use App\AktivitasKaryawan;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Tampil data booking
     */
    public function index()
    {
        $books = Booking::DataBooking();
        return view('booking.index', compact('books'));
    }

    /**
     * Tampil form booking
     */
    public function formNew()
    {
        return view('booking.form');
    }

    /**
     * Save data booking  
     */
    public function postNew(Request $request)
    {
        $pelanggan = New Pelanggan();
        $pelanggan->nama = $request->nama;
        $pelanggan->no_ktp = $request->no_ktp;
        $pelanggan->telp = $request->notelp;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->save();

        $idPelanggan = Pelanggan::where('nama', $request->nama)->value('id');
        // dd($idPelanggan);

        $tglCekin = new DateTime($request->checkin);
        $tglCekout = new DateTime($request->checkout);
        $jumlah_hari = $tglCekin->diff($tglCekout);
        $hari = ($jumlah_hari->format('%a')) + 1;
        
        $harga = Kamar::where('id', $request->kamar)->value('harga');
        // $harga = Kamar::harga();

        $total = $hari * $harga;

        $book = New Booking();
        $book->id_kamar = $request->kamar;
        $book->id_user = Auth::user()->id;
        $book->id_pelanggan = $idPelanggan;
        $book->checkin_time = $tglCekin;
        $book->checkout_time = $tglCekout;
        $book->total = $total;
        $book->lama_menginap = $hari;
        $book->keterangan = $request->keterangan;
        $book->active = 1;
        $book->save();

        $room = Kamar::find($request->kamar);
        $room->active = 0;
        $room->update();

        $karyawan = new AktivitasKaryawan();
        $karyawan->nama_kary = Auth::user()->fullname;
        $karyawan->info_kary = Auth::user()->alamat. ' '. Auth::user()->telp;
        $karyawan->aktivitas = "Kamar baru dipesan. Nama Pelanggan: ". $request->nama. "No KTP: ". $request->no_ktp. "Alamat: ". $request->alamat. "Telepon: ". $request->notelp;
        $karyawan->save();
        return back()->with('success', 'Kamar sukses dibooking');

    }

    /**
     * Edit data booking
     */
    public function editBooking($id, Request $request)
    {
        if($request->Method('GET')) {
            $book = Booking::find($id);
            return view('booking.edit', $book);
        } elseif($request->Method('POST')) {
            $book = Booking::find($id);
            $book->checkin_time = $request->checkin;
            $book->checkout_time = $request->checkout;
        }
    }
}
