<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        return view('karyawan.form');
    }

    public function formNew()
    {
        return view('karyawan.form');
    }
}
