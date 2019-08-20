<?php

namespace App\Http\Controllers;

use App\Kamar;
use App\AktivitasKaryawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KamarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kamar = Kamar::listKamar();
        return view('kamar.index', ['kamar' => $kamar]);
    }

    public function formNew()
    {
        return view('kamar.form');
    }

    public function postNew(Request $request)
    {
        $kamar = new Kamar();
        $kamar->no_kamar = $request->kamar;
        $kamar->lantai = $request->lantai;
        $kamar->blok_id = $request->blok;
        $kamar->tipe = $request->tipe;
        $kamar->harga = $request->harga;
        $kamar->fasilitas = $request->fasilitas;
        $kamar->active = 1;
        $kamar->save();

        $karyawan = new AktivitasKaryawan();
        $karyawan->nama_kary = Auth::user()->fullname;
        $karyawan->info_kary = Auth::user()->alamat. ' '. Auth::user()->telp;
        $karyawan->aktivitas = "Kamar Baru Ditambhakan No Kamar: ". $request->kamar;
        $karyawan->save();

        return back()->with('success', 'Blok baru sukses ditambahkan!1!1');

    } 

    public function showEdit($id)
    {
        $kamar = Kamar::find($id);
        return view('kamar.edit')
            ->with('Kamar', $kamar);
    }
}
