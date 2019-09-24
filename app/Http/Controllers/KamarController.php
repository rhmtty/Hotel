<?php

namespace App\Http\Controllers;

use App\Kamar;
use App\AktivitasKaryawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class KamarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kamar = Kamar::dataKamar();
        return view('kamar.index', ['kamar' => $kamar]);
    }

    public function formNew()
    {
        return view('kamar.form');
    }

    public function postNew(Request $request)
    {
        $msg = [
            'required' => 'form tidak boleh kosong!!',
            'min' => 'harus diisi minimal :min karakter',
            'max' => 'harus diisi minimal :max karakter',
            'unique' => 'kamar sudah ada',
        ];
        $this->validate($request,[
            'kamar' => 'required|numeric|unique:kamar,no_kamar',
            'lantai' => 'required',
            'blok' => 'required',
            'tipe' => 'required',
            'harga' => 'required|alpha_num',
            'fasilitas' => 'required'
        ], $msg); 

        $kamar = new Kamar();
        $kamar->no_kamar = $request->kamar;
        $kamar->lantai = $request->lantai;
        $kamar->blok_id = $request->blok;
        $kamar->tipe = $request->tipe;
        $kamar->harga = $request->harga;
        $kamar->fasilitas = $request->fasilitas;
        $kamar->active = $request->tersedia == "on" ? 1 : 0;
        $kamar->save();

        $karyawan = new AktivitasKaryawan();
        $karyawan->nama_kary = Auth::user()->fullname;
        $karyawan->info_kary = Auth::user()->alamat. ' '. Auth::user()->telp;
        $karyawan->aktivitas = "Menambah data Kamar: ". $request->kamar;
        $karyawan->save();

        return back()->with('success', 'Kamar baru sukses ditambahkan!!');

    } 

    public function showEdit($id)
    {
        $kamar = Kamar::find($id);
        return view('kamar.edit')
            ->with('kamar', $kamar);
    }

    public function postEdit(Request $request, $id)
    {
        $kamar = Kamar::find($id);
        $kamar->no_kamar = $request->kamar;
        $kamar->lantai = $request->lantai;
        $kamar->blok_id = $request->blok;
        $kamar->tipe = $request->tipe;
        $kamar->harga = $request->harga;
        $kamar->fasilitas = $request->fasilitas;
        $kamar->update();

        $karyawan = new AktivitasKaryawan();
        $karyawan->nama_kary = Auth::user()->fullname;
        $karyawan->info_kary = Auth::user()->alamat. ' '. Auth::user()->telp;
        $karyawan->aktivitas = "Mengedit data Kamar: ". $request->kamar;
        $karyawan->save();
        return back()->with('kamar', $kamar)->with('success', 'Kamar sukses diupdate!!');
    }

    public function delete(Request $request)
    {
        $kamar = Kamar::where('id', $request->id)
        // dd($kamar);
            ->delete();

        $karyawan = new AktivitasKaryawan();
        $karyawan->nama_kary = Auth::user()->fullname;
        $karyawan->info_kary = Auth::user()->alamat. ' '. Auth::user()->telp;
        $karyawan->aktivitas = "Menghapus data Kamar: ". $request->no_kamar;
        $karyawan->save();
        return back()->with('kamar', $kamar)->with('hapus', 'Kamar sukses dihapus!!');
    }
    public function cari(Request $request)
    {
        // menangkap data pencarian
        $keyword = $request->get('cari');
        $kamar = DB::table('kamar')
        ->join('blok', 'kamar.blok_id', '=', 'blok.id')
        ->where('no_kamar','like',"%".$keyword."%")->paginate(5);

        // $kamar = Kamar::search('no_kamar')->where('no_kamar','like','%'.$keyword.'%')->get();
        // dd($kamar);
    
            // mengirim data pegawai ke view index
        return view('kamar.index',['kamar' => $kamar]);
    
    }
}
