<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipeKamarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('tipe_kamar.index');
    }

    public function formNew()
    {
        return view('tipe_kamar.form');
    }
}
