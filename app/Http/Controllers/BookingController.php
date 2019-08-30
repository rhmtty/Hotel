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
            $book = Booking::EditBooking($id);
            return view('booking.edit', compact('book'));
        } elseif($request->Method('POST')) {
            $book = Booking::find($id);
            $book->checkin_time = $request->checkin;
            $book->checkout_time = $request->checkout;
        }
    }

    public function CheckOut(Request $request, $id)
    {
        if($request->isMethod('GET')) {
            /**
             * Tampil Check Out
             */
            $booking = Booking::DataCheckOut($id);
            return view('booking.checkout', compact('booking'));
        } elseif($request->isMethod('POST')) {
            /**
             * Proses check out
             */
            $booking = Booking::find($id);
            $booking->exists = true;
            $booking->active = 0;
            $booking->save();
            $kamar = Kamar::find($booking->id_kamar);
            $kamar->active = 1;
            $kamar->save();
            // dd($booking, $kamar);

            $infop = Pelanggan::find($booking->id_pelanggan);

            $karyawan = new AktivitasKaryawan();
            $karyawan->nama_kary = Auth::user()->fullname;
            $karyawan->info_kary = Auth::user()->alamat. ' '. Auth::user()->telp;
            $karyawan->aktivitas = "Proses Check Out. Nama Pelanggan: ". $infop->nama. "No KTP: ". $infop->no_ktp. "Alamat: ". $infop->alamat. "Telepon: ". $infop->notelp. ".". "No Kamar: ". $kamar->no_kamar. "Tipe: ". $kamar->tipe. "Totaln Tagihan: ". $booking->total;
            $karyawan->save();
            return redirect('/admin/booking')->with('booking', 'Proses Check Out sukses dilakukan!!');

        }
        
    }
}
