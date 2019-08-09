<?php

namespace App\Http\Controllers;

use App\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        return view('kamar.index');
    }

    public function formNew()
    {
        return view('kamar.form');
    }

    public function postNew(Request $request)
    {
        $kamar = new Kamar();
        $kamar->no_kamar = $request->kamar;
        $kamar->lantai_id = $request->lantai;
        $kamar->blok_id = $request->blok;
        $kamar->tipe_id = $request->tipe_kamar;
        $kamar->deskripsi = $request->deskripsi;
        $kamar->active = $request->tersedia == "on" ? 1:0;
        $kamar->save();
    } 
}
