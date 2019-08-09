<?php

namespace App\Http\Controllers;

use App\Blok;
use Illuminate\Http\Request;

class BlokController extends Controller
{
    public function index()
    {
        return view('blok.index');
    }

    public function formNew()
    {
        return view('blok.form');
    }

    
}
