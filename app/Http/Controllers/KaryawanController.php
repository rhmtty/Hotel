<?php

namespace App\Http\Controllers;

use App\AktivitasKaryawan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $karyawans = Auth::user()->get();
        return view('karyawan.index', ['karyawans' => $karyawans]);
    }
    public function formNew()
    {
        return view('karyawan.form');
    }

    public function showProfile($id)
    {
        $karyawan = Auth::user()->get();
        return view('karyawan.profile', $karyawan);
    }

    public function postProfile($id=null, Request $request)
    {
        
        if($request->isMethod('GET')) {
            $karyawan = User::find($id);
            return view('karyawan.profile', ['karyawan' => $karyawan]);
        }elseif($request->isMethod('POST')) {
        $this->validate($request,[
           'nama' => 'required|min:5|max:20',
           'email' => 'required',
           'pass' => 'required|min:6|max:20',
           'jk' => 'required',
           'telp' => 'required|numeric',
           'alamat' => 'required|min:5|max:20',
        ]);
            $karyawan = User::find($id);
            $karyawan->fullname = $request->nama;
            $karyawan->email = $request->email;
            $karyawan->password = bcrypt($request->pass);
            $karyawan->jenis_kelamin = $request->jk;
            $karyawan->telp = $request->telp;
            $karyawan->alamat = $request->alamat;
            if(Auth::user()->role=='Superuser') {
                $karyawan->role = $request->role;
            }
            // dd($karyawan);
            $karyawan->update();
            return back()->with('success', 'Profile berhasil diubah!!');
        }
    }
}
