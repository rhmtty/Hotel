<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LantaiController extends Controller
{
    public function index()
    {
        return view('lantai.index');
    }

    public function formNew()
    {
        return view('lantai.form');
    }

}
