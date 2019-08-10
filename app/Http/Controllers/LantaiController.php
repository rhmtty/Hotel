<?php

namespace App\Http\Controllers;

use App\Lantai;
use App\AktivitasKaryawan;
use Illuminate\Http\Request;

class LantaiController extends Controller
{
    public function index()
    {
        return view('lantai.index');
    }

    public function formNew()
    {
        return view('lantai.form');
    }

    public function postNew(Request $request)
    {
        $lantai = new Lantai();
        $lantai->kode_lantai = $request->kode;
        $lantai->level = $request->no_lantai;
        $lantai->save();

        // $karyawan = new AktivitasKaryawan();
        // // $karyawan->nama_kary = Auth::user()->full_name;
        // // $karyawan->info_kary = Auth::user()->alamat.' '.Auth::user()->telp;
        // $karyawan->aktivitas = "Lantai Baru Ditambahakan</br>Kode Lantai:". $request->kode;
        // $karyawan->save();

        return back()->with('success', 'Lantai baru sukses ditambahkan.!');

    }

}
