<?php

namespace App\Http\Controllers;

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
        return view('karyawan.form');
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
