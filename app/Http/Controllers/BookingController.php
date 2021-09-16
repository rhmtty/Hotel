<?php

namespace App\Http\Controllers;

use DateTime;
use App\Kamar;
use App\Booking;
use App\Pelanggan;
use App\AktivitasKaryawan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function validationMessage()
    {
        $msg = [
            'required' => 'form :attribute tidak boleh kosong!!',
            'min' => ':attribute harus diisi minimal :min karakter',
            'max' => ':attribute harus diisi minimal :max karakter',
            'after_or_equal' => 'Tanggal check in/check out tidak valid',
            'numeric' => ':attribute data harus berupa angka',
            'alpha' => 'form :attribute harus berupa huruf',
            'date' => ':attribute harus berupa tanggal',
            'required_without' => 'pilih metode pembayaran',
        ];

        return $msg;
    }

    /**
     * Tampil data booking
     */
    public function index()
    {
        $book = Booking::DataBooking();
        return view('booking.index', ['book' => $book]);
    }

    /**
     * Tampil form booking
     */
    public function formNew()
    {
        $data_bank = ApiController::getDataBankAPI();
        $data_emoney = ApiController::getDataEmoneyAPI();

        return view('booking.form', compact('data_bank', 'data_emoney'));
    }

    /**
     * Save data booking  
     */
    public function postNew(Request $request)
    {
        $request->validate([
            'customer_name' => 'bail|required|min:1|max:20|alpha',
            'no_ktp' => 'required|min:1|numeric',
            'customer_phone' => 'required|numeric',
            'customer_address' => 'required',
            'customer_email' => 'required|email',
            'kamar' => 'required',
            'checkin' => 'required|date|after_or_equal:today',
            'checkout' => 'required|date|after_or_equal:checkin',
            'pembayaranBank' => 'required_without:pembayaranEmoney',
            'pembayaranEmoney' => 'required_without:pembayaranBank'
        ], $this->validationMessage());

        // SIMPAN DATA KE TABEL PELANGGAN
        $pelanggan = new Pelanggan();
        $pelanggan->customer_id = uniqid();
        $pelanggan->customer_name = $request->customer_name;
        // $pelanggan->username = $request->username;
        // $pelanggan->pin = $request->pin;
        $pelanggan->customer_phone = $request->customer_phone;
        $pelanggan->customer_email = $request->customer_email;
        $pelanggan->no_ktp = $request->no_ktp;
        $pelanggan->customer_address = $request->customer_address;
        // $pelanggan->password = bcrypt($request->password);
        $pelanggan->jenis_kelamin = $request->jenis_kelamin;
        $pelanggan->save();

        $tglCekin = new DateTime($request->checkin);
        $tglCekout = new DateTime($request->checkout);
        $jumlah_hari = $tglCekin->diff($tglCekout);
        $hari = ($jumlah_hari->format('%a')) + 1;

        $harga = Kamar::where('id', $request->kamar)->value('harga');

        $amount = $hari * $harga;

        $id_pelanggan = $pelanggan::where('customer_name', $request->customer_name)->value('id');

        $invoice = date('Ymd') . rand(0, 99);

        // MENYIMPAN DATA KE TABEL BOOKING
        $book = new Booking();
        $book->id_kamar = $request->kamar;
        $book->id_bank = $request->pembayaranBank;
        $book->kode_produk = $request->pembayaranEmoney;

        if (Auth::user()) {
            $book->id_user = Auth::user()->id;
        }

        $book->id_pelanggan = $id_pelanggan;
        $book->checkin_time = $tglCekin;
        $book->checkout_time = $tglCekout;
        $book->amount = $amount;
        $book->lama_menginap = $hari;
        $book->active = 1;
        $book->invoice = $invoice;
        $book->save();

        $room = Kamar::find($request->kamar);
        $room->active = 0;
        $room->update();

        // MENYIMPAN LOG AKTIVITAS KE TABEL AKTIVITAS KARYAWAN
        if (Auth::user()) {
            $karyawan = new AktivitasKaryawan();
            $karyawan->nama_karyawan = Auth::user()->fullname;
            $karyawan->info_karyawan = Auth::user()->alamat . ' ' . Auth::user()->telp;
            $karyawan->aktivitas = "Kamar baru dipesan. Nama Pelanggan: " . $request->nama . " No KTP: " . $request->no_ktp . " Alamat: " . $request->alamat . " Telepon: " . $request->notelp;
            $karyawan->save();
        }

        return redirect('/transaction/pesanan-saya/' . $invoice)->with('success', 'Harap catat nomor invoice untuk melakukan pembayaran');
    }

    /**
     * Edit data booking
     */
    public function editData(Request $request, $id)
    {
        if ($request->isMethod('GET')) {
            $book = Booking::EditBooking($id);
            $data_bank = ApiController::getDataBankAPI();
            $data_emoney = ApiController::getDataEmoneyAPI();

            return view('booking.edit', compact('book', 'data_bank', 'data_emoney'));
        } elseif ($request->isMethod('POST')) {

            $request->validate([
                'customer_name' => 'bail|required|min:1|max:20|alpha',
                'no_ktp' => 'required|min:1|numeric',
                'customer_phone' => 'required|numeric',
                'customer_address' => 'required',
                'customer_email' => 'required|email',
                'kamar' => 'required',
                'checkin' => 'required|date|after_or_equal:today',
                'checkout' => 'required|date|after_or_equal:checkin',
                'pembayaranBank' => 'required_without:pembayaranEmoney',
                'pembayaranEmoney' => 'required_without:pembayaranBank'
            ], $this->validationMessage());

            $tglCekin = new DateTime($request->checkin);
            $tglCekout = new DateTime($request->checkout);
            $jumlah_hari = $tglCekin->diff($tglCekout);
            $hari = ($jumlah_hari->format('%a')) + 1;

            $harga = Kamar::where('id', $request->id_kamar)->value('harga');

            $book = Booking::find($id);
            $book->exists = true;
            $book->id = $request->id;
            $book->lama_menginap = $hari;
            $book->checkin_time = $request->checkin;
            $book->checkout_time = $request->checkout;
            $book->amount = $hari * $harga;
            $book->id_bank = $request->pembayaranBank;
            $book->kode_produk = $request->pembayaranEmoney;
            $book->update();

            $karyawan = new AktivitasKaryawan();
            $karyawan->nama_karyawan = Auth::user()->fullname;
            $karyawan->info_karyawan = Auth::user()->alamat . ' ' . Auth::user()->telp;
            $karyawan->aktivitas = "Mengedit data booking. ID booking: " . $id;
            $karyawan->save();
            return redirect('/booking')->with('success-edit', 'Data booking sukses di edit!!');
        }
    }

    public function CheckOut(Request $request, $invoice)
    {
        if ($request->isMethod('GET')) {
            /**
             * Tampil Check Out
             */
            $booking = Booking::DataCheckOut($invoice);

            return view('booking.checkout', compact('booking'));
        } elseif ($request->isMethod('POST')) {
            /**
             * Proses check out
             */

            $booking = Booking::where('invoice', $invoice)->first();

            // $tgl_checkin = new DateTime($booking->checkin_time);
            // $today = new DateTime();
            // $jumlah_hari = $tgl_checkin->diff($today);
            // $formatted_jumlahHari = $jumlah_hari->format('%a');
            // // dd($formatted_jumlahHari);

            $booking->exists = true;
            $booking->active = 0;
            $booking->save();

            $kamar = Kamar::find($booking->id_kamar);
            $kamar->active = 1;
            $kamar->save();

            $infop = Pelanggan::find($booking->id_pelanggan);

            if (Auth::user()) {
                $karyawan = new AktivitasKaryawan();
                $karyawan->nama_karyawan = Auth::user()->fullname;
                $karyawan->info_karyawan = Auth::user()->alamat . ' ' . Auth::user()->telp;
                $karyawan->aktivitas = "Proses Check Out. Nama Pelanggan: " . $infop->nama . " No KTP: " . $infop->no_ktp . "Alamat: " . $infop->alamat . " Telepon: " . $infop->telp . " No Kamar: " . $kamar->no_kamar . " Tipe: " . $kamar->tipe . " Total Tagihan: Rp. " . $booking->amoun;
                $karyawan->save();
            }

            return redirect('/booking')->with('checkout', 'Proses Check Out sukses dilakukan!!');
        }
    }

    public function deleteBooking(Request $request)
    {
        $booking = Booking::where('id', $request->id)->delete();
        $kamar = Kamar::find($request->id_kamar);
        $kamar->active = 1;
        $kamar->save();
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $keyword = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $cari = DB::table('bookings')
            ->join('kamar', 'bookings.id_kamar', '=', 'kamar.id')
            ->join('users', 'bookings.id_user', '=', 'users.id')
            ->join('pelanggan', 'bookings.id_pelanggan', '=', 'pelanggan.id')
            ->where('pelanggan.customer_name', 'like', '%' . $keyword . '%')
            ->orWhere('pelanggan.no_ktp', 'like', '%' . $keyword . '%')
            ->orWhere('kamar.no_kamar', 'like', '%' . $keyword . '%')
            ->select('bookings.*', 'kamar.no_kamar as nomer_kamar', 'kamar.lantai as lantai_kamar', 'kamar.blok_id as nama_blok', 'kamar.tipe as tipe_kamar', 'kamar.harga as harga_kamar', 'kamar.fasilitas as fasilitas_kamar', 'users.fullname as operator', 'pelanggan.no_ktp as ktp_pelanggan', 'pelanggan.customer_name as nama_pelanggan', 'pelanggan.customer_phone as telp_pelanggan', 'pelanggan.customer_address as alamat_pelanggan')
            ->get();

        // mengirim data pegawai ke view index
        return view('booking.index', ['book' => $cari]);
    }
}
