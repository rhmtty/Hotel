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
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
        $karyawan->aktivitas = "Lantai Baru Ditambahkan Kode Lantai:". ' '. $request->kode;
        $karyawan->save();

        return back()->with('success', 'Lantai baru sukses ditambahkan.!');
    }

    public function showEdit($id)
    {
        $lantai = Lantai::find($id);
        return view('lantai.edit')
            ->withLantai($lantai);
    }

    public function postEdit(Request $request, $id)
    {
        $lantai = Lantai::find($id);
        $lantai->kode_lantai = $request->kode;
        $lantai->nama_lantai = $request->nama;
        $lantai->level = $request->no_lantai;
        $lantai->deskripsi = $request->deskripsi;
        $lantai->update();

        $karyawan = new AktivitasKaryawan();
        $karyawan->nama_kary = Auth::user()->fullname;
        $karyawan->info_kary = Auth::user()->alamat.' '.Auth::user()->telp;
        $karyawan->aktivitas = "Infromasi Lantai Diperbarui dengan Kode Lantai: ". $request->kode;
        $karyawan->save();

        return redirect('/admin/lantai')->with('success', 'Lantai Sukses Diperbarui.!');
    }

    public function delete(Request $request, $id)
    {
        $lantai = Lantai::find($id);
        $lantai->delete();

        $karyawan = new AktivitasKaryawan();
        $karyawan->nama_kary = Auth::user()->fullname;
        $karyawan->info_kary = Auth::user()->alamat.' '.Auth::user()->telp;
        $karyawan->aktivitas = "Lantai Dihapus Kode Lantai: ". $lantai->kode_lantai;
        $karyawan->save();

        return back()->with('delete', 'Lantai Sukses Dihapus.!');
    }

}
