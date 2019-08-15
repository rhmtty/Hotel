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
        $data['blok'] = Blok::get();
        return view('blok.index', $data);
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

    public function showEdit($id)
    {
        $blok = Blok::find($id);
        return view('blok.edit')->with('blok', $blok);
    }

    public function postEdit(Request $request, $id)
    {
        $blok = Blok::find($id);
        $blok->nama_blok = $request->nama;
        $blok->deskripsi = $request->deskripsi;
        $blok->update();

        $karyawan = new AktivitasKaryawan();
        $karyawan->nama_kary = Auth::user()->fullname;
        $karyawan->info_kary = Auth::user()->alamat. ' '. Auth::user()->telp;
        $karyawan->aktivitas = "Blok Sukses di edit Nama Blok: ". $request->nama;
        $karyawan->save();

        return redirect('/admin/blok')->with('success', 'Blok sukses diperbarui!1!1');
    }
}
