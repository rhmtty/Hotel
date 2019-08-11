<?php

namespace App\Http\Controllers;

use App\Lantai;
use App\AktivitasKaryawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;

class LantaiController extends Controller
{
    public function index()
    {
        $data['lantai'] = Lantai::get();
        return view('lantai.index', $data);
    }

    public function formNew()
    {
        return view('lantai.form');
    }

    public function postNew(Request $request)
    {
        // $this->validate($request, [
        //     'kode_lantai' => 'required',
        //     'nama_lantai' => 'required',
        //     'level' => 'required',
        //     'deskripsi' => 'required'
        // ]);

        $lantai = new Lantai();
        $lantai->kode_lantai = $request->kode;
        $lantai->nama_lantai = $request->nama;
        $lantai->level = $request->no_lantai;
        $lantai->deskripsi = $request->deskripsi;
        $lantai->save();

        $karyawan = new AktivitasKaryawan();
        $karyawan->nama_kary = Auth::user()->fullname;
        $karyawan->info_kary = Auth::user()->alamat.' '.Auth::user()->telp;
        $karyawan->aktivitas = "Lantai Baru Ditambahakan</br>Kode Lantai:". ' '. $request->kode;
        $karyawan->save();

        return back()->with('success', 'Lantai baru sukses ditambahkan.!');

    }

}
