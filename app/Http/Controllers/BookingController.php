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
use DB;

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
        $book = Booking::DataBooking();
        return view('booking.index',['book' => $book]);
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
        $msg = [
            'required' => 'form tidak boleh kosong!!',
            'min' => 'harus diisi minimal :min karakter',
            'max' => 'harus diisi minimal :max karakter',
            'after_or_equal' => 'Tanggal check in/check out tidak valid',
        ];
        $this->validate($request,[
           'nama' => 'required|min:1|max:20',
           'no_ktp' => 'required|min:1|numeric',
           'notelp' => 'required|numeric',
           'alamat' => 'required|max:20',
           'checkin' => 'required|date|after_or_equal:today',
           'checkout' => 'required|date|after_or_equal:checkin'
        ], $msg);
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
        $this->validate($request, [
            'kamar' => 'required',
            'keterangan' => 'required',
        ]);
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
        $karyawan->aktivitas = "Kamar baru dipesan. Nama Pelanggan: ". $request->nama. " No KTP: ". $request->no_ktp. " Alamat: ". $request->alamat. " Telepon: ". $request->notelp;
        $karyawan->save();
        return back()->with('success', 'Kamar sukses dibooking');

    }

    /**
     * Edit data booking
     */
    public function editData(Request $request, $id)
    {
        if($request->isMethod('GET')) {
            $book = Booking::EditBooking($id);
            return view('booking.edit', compact('book'));
        } elseif($request->isMethod('POST')) {

            // $this->validate($request,[
            //     'nama' => 'required|min:1|max:20',
            //     'no_ktp' => 'required|min:1|same:no_ktp|numeric',
            //     'notelp' => 'required|numeric',
            //     'alamat' => 'required|max:20',
            //     'checkin' => 'required|date|after_or_equal:today',
            //     'checkout' => 'required|date'
            //  ]);

            $tglCekin = new DateTime($request->checkin);
            $tglCekout = new DateTime($request->checkout);
            $jumlah_hari = $tglCekin->diff($tglCekout);
            $hari = ($jumlah_hari->format('%a')) + 1;
            
            $harga = Kamar::where('id', $request->id_kamar)->value('harga');
            // dd($harga);
            // $total = $hari * $harga;

            $book = Booking::find($id);
            $book->exists = true;
            $book->id = $request->id;
            $book->lama_menginap = $hari;
            $book->checkin_time = $request->checkin;
            $book->checkout_time = $request->checkout;
            $book->total = $hari * $harga;
            // dd($book);
            $book->update();
            
            $karyawan = new AktivitasKaryawan();
            $karyawan->nama_kary = Auth::user()->fullname;
            $karyawan->info_kary = Auth::user()->alamat. ' '. Auth::user()->telp;
            $karyawan->aktivitas = "Mengedit data booking. ID booking: ". $id;
            $karyawan->save();
            return redirect('/admin/booking')->with('success-edit', 'Data booking sukses di edit!!');
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
            $karyawan->aktivitas = "Proses Check Out. Nama Pelanggan: ". $infop->nama. " No KTP: ". $infop->no_ktp. "Alamat: ". $infop->alamat. " Telepon: ". $infop->telp. " No Kamar: ". $kamar->no_kamar. " Tipe: ". $kamar->tipe. " Total Tagihan: Rp. ". $booking->total;
            $karyawan->save();
            return redirect('/admin/booking')->with('checkout', 'Proses Check Out sukses dilakukan!!');

        }
        
    }

    public function deleteBooking(Request $request)
    {
        $booking = Booking::where('id', $request->id)->delete();
        $kamar = Kamar::find($request->id_kamar);
        // dd($booking, $kamar);
        $kamar->active = 1;
        $kamar->save();
    }
	public function hasilcari()
	{
    		// mengambil data dari table pegawai
		$booking = DB::table('booking')->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('booking.index',['booking' => $booking]);
 
	}
 
    public function cari(Request $request)
    {
    	// menangkap data pencarian
        $keyword = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        // $data['result'] = $result;
        $cari = DB::table('bookings')
            ->join('kamar', 'bookings.id_kamar', '=', 'kamar.id')
            ->join('users', 'bookings.id_user', '=', 'users.id')
            ->join('pelanggan', 'bookings.id_pelanggan', '=', 'pelanggan.id')
            // ->where('bookings.active', 1)
            ->where('pelanggan.nama', 'like', '%'. $keyword .'%')
            ->orWhere('pelanggan.no_ktp','like','%'.$keyword.'%')
            ->orWhere('kamar.no_kamar','like','%'.$keyword.'%')
            ->select('bookings.*', 'kamar.no_kamar as nomer_kamar', 'kamar.lantai as lantai_kamar', 'kamar.blok_id as nama_blok', 'kamar.tipe as tipe_kamar', 'kamar.harga as harga_kamar', 'kamar.fasilitas as fasilitas_kamar', 'users.fullname as operator', 'pelanggan.no_ktp as ktp_pelanggan', 'pelanggan.nama as nama_pelanggan', 'pelanggan.telp as telp_pelanggan', 'pelanggan.alamat as alamat_pelanggan')
            ->paginate(5);
        // mengirim data pegawai ke view index
        // dd($cari);
        return view('booking.index', ['book' => $cari]);

    }
}