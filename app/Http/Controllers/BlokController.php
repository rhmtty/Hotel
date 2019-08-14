<?php

namespace App\Http\Controllers;

use App\Blok;
use App\AktivitasKaryawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlokController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('blok.index');
    }

    public function formNew()
    {
        return view('blok.form');
    }

    public function postNew(Request $request)
    {
        $blok = new Blok();
        $blok->nama_blok = $request->nama;
        $blok->deskripsi = $request->deskripsi;
        $blok->save();

        $karyawan = new AktivitasKaryawan();
        $karyawan->nama_kary = Auth::user()->fullname;
        $karyawan->info_kary = Auth::user()->alamat. ' '. Auth::user()->telp;
        $karyawan->aktivitas = "Blok Baru Ditambhakan Nama Blok: ". $request->nama;
        $karyawan->save();

        return back()->with('success', 'Blok baru sukses ditambahkan!1!1');

    }

    
}
