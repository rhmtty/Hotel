<?php

namespace App\Http\Controllers;

use App\AktivitasKaryawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('karyawan.profile');
    }
}
