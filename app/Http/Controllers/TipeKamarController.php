<?php

namespace App\Http\Controllers;

use App\TipeKamar;
use App\AktivitasKaryawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;

class TipeKamarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data['tipe_kamar'] = TipeKamar::get();
        return view('tipe_kamar.index',$data);
    }

    public function formNew()
    {
        return view('tipe_kamar.form');
    }

    public function postNew(Request $request)
    {
        // $this->validate($request, [
        //     'kode_lantai' => 'required',
        //     'nama_lantai' => 'required',
        //     'level' => 'required',
        //     'deskripsi' => 'required'
        // ]);

        $tipekamar = new TipeKamar();
        $tipekamar->tipe_kamar = $request->tipe;
        $tipekamar->harga = $request->harga;
        $tipekamar->deskripsi = $request->deskripsi;
        $tipekamar->save();

        $karyawan = new AktivitasKaryawan();
        $karyawan->nama_kary = Auth::user()->fullname;
        $karyawan->info_kary = Auth::user()->alamat.' '.Auth::user()->telp;
        $karyawan->aktivitas = "Tipe Kamar Baru Ditambahkan Tipe Kamar:". ' '. $request->tipe;
        $karyawan->save();

        return back()->with('success', 'Tipe Kamar baru sukses ditambahkan.!');
    }

    public function showEdit($id)
    {
        $tipekamar = TipeKamar::find($id);
        return view('tipe_kamar.edit')
            ->with('tipekamar',$tipekamar);
    }

    public function postEdit(Request $request, $id)
    {
        $tipekamar = TipeKamar::find($id);
        $tipekamar->tipe_kamar = $request->tipe;
        $tipekamar->harga = $request->harga;
        $tipekamar->deskripsi = $request->deskripsi;
        $tipekamar->update();

        $karyawan = new AktivitasKaryawan();
        $karyawan->nama_kary = Auth::user()->fullname;
        $karyawan->info_kary = Auth::user()->alamat.' '.Auth::user()->telp;
        $karyawan->aktivitas = "Infromasi Tipe Kamar Diperbarui. Tipe Kamar: ". $request->tipe;
        $karyawan->save();

        return redirect('/admin/tipe_kamar')->with('success', 'Tipe Kamar Sukses Diperbarui.!');
    }


    public function delete(Request $request, $id)
    {
        $tipekamar = TipeKamar::find($id);
        $tipekamar->delete();

        $karyawan = new AktivitasKaryawan();
        $karyawan->nama_kary = Auth::user()->fullname;
        $karyawan->info_kary = Auth::user()->alamat.' '.Auth::user()->telp;
        $karyawan->aktivitas = "Tipe Kamar Dihapus Tipe Kamar: ". $tipekamar->tipe_kamar;
        $karyawan->save();

        return back()->with('delete', 'Tipe Kamar Sukses Dihapus.!');
    }

}
