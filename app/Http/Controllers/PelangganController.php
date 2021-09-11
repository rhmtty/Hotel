<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function register()
    {
        return view('customer.register');
    }

    public function postRegister(Request $request)
    {
        $retail_payment = ApiController::createRetailPaymentAPI();

        $pelanggan = new Pelanggan();
        $pelanggan->customer_id = 'generate otomatis';
        $pelanggan->customer_name = $request->customer_name;
        $pelanggan->username = $request->username;
        $pelanggan->pin = 'PIN Transaction Linkqu Account';
        $pelanggan->customer_phone = $request->customer_phone;
        $pelanggan->customer_email = $request->customer_email;
        $pelanggan->no_ktp = $request->ktp;
        $pelanggan->customer_address = $request->customer_address;
        $pelanggan->password = bcrypt($request->password);
        $pelanggan->jenis_kelamin = $request->jenis_kelamin;
        $pelanggan->save();

        return back()->with('success', 'Data pelanggan berhasil di tambah!');
    }

    public function newBooking()
    {
        $data_bank = ApiController::getDataBankAPI();
        $data_emoney = ApiController::getDataEmoneyAPI();
        $data_resumeAccount = ApiController::getResumeAccountAPI();
        // dd($data_resumeAccount);

        return view('customer.form', compact('data_bank', 'data_emoney', 'data_resumeAccount'));
    }

    public function createVirtualAccount()
    {
        return view('customer.vaForm');
    }

    // public function postVirtualAccount()
    // {
    //     $pelanggan = new Pelanggan();

    //     $create_va = ApiController::createVirtualAccountAPI();
    // }

    public function createRetailPayment()
    {
    }
}
