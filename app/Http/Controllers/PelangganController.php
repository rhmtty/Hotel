<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use App\RetailPayment;
use App\VirtualAccount;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    public function register()
    {
        return view('customer.register');
    }

    public function loginForm()
    {
        return view('customer.login');
    }

    public function postRegister(Request $request)
    {
        // $retail_payment = ApiController::createRetailPaymentAPI();

        $pelanggan = new Pelanggan();
        $pelanggan->customer_id = uniqid();
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

        return view('customer.form', compact('data_bank', 'data_emoney', 'data_resumeAccount'));
    }

    public function createVirtualAccount()
    {
        return view('customer.vaForm');
    }

    public function postVirtualAccount(Request $request)
    {
        $dataArray = [
            "amount" => 25000,
            "partner_reff" => "200102083952562712182",
            "customer_id" => uniqid(),
            "customer_name" => $request->customer_name,
            "expired" => "20211231230000",
            "username" => "LI307GXIN",
            "pin" => $request->pin,
            "customer_phone" => $request->customer_phone,
            "customer_email" => $request->customer_email,
            "bank_code" => $request->bank_code
        ];
        $response = json_encode($dataArray);
        // UNTUK MEGECEK APABILA DATA SUKSES 
        $isSuccess = ApiController::createVirtualAccountAPI($response);
        $jsonDecode = json_decode($isSuccess);

        if ($jsonDecode->status == 'FAILED') {
            $virtual_account = new VirtualAccount();
            $virtual_account->amount = $request->amount;
            $virtual_account->bank_code = $request->bank_code;
            $virtual_account->expired = $request->expired;
            $virtual_account->partner_reff = $request->partner_reff;
            $virtual_account->save();

            $customer = new Pelanggan();
            $customer->customer_id = $dataArray['customer_id'];
            $customer->customer_name = $dataArray['customer_name'];
            $customer->username = $dataArray['username'];
            $customer->pin = $dataArray['pin'];
            $customer->customer_phone = $dataArray['customer_phone'];
            $customer->customer_email = $dataArray['customer_email'];
            $customer->save();
        }
    }

    public function createRetailPayment()
    {
        return view('customer.retailPaymentForm');
    }

    public function postRetailPayment(Request $request)
    {
        $dataArray = [
            "amount" => $request->amount,
            "partner_reff" => "20010208395256276661",
            "customer_id" => uniqid(),
            "customer_name" => $request->customer_name,
            "expired" => "20211102230000",
            "username" => "PI307GWANN",
            "pin" => $request->pin,
            "retail_code" => $request->retailCode,
            "customer_phone" => $request->customer_phone,
            "customer_email" => $request->customer_email
        ];
        $response = json_encode($dataArray);
        // UNTUK MEGECEK APABILA DATA SUKSES 
        $isSuccess = ApiController::createRetailPaymentAPI($response);
        $jsonDecode = json_decode($isSuccess);

        if ($jsonDecode->status == 'SUCCESS') {
            $retail_payment = new RetailPayment();
            $retail_payment->amount = $request->amount;
            $retail_payment->retail_code = $request->retailCode;
            $retail_payment->expired = $dataArray['expired'];
            $retail_payment->partner_reff = $dataArray['partner_reff'];
            $retail_payment->save();

            $customer = new Pelanggan();
            $customer->customer_id = $dataArray['customer_id'];
            $customer->customer_name = $dataArray['customer_name'];
            $customer->username = $dataArray['username'];
            $customer->pin = $dataArray['pin'];
            $customer->customer_phone = $dataArray['customer_phone'];
            $customer->customer_email = $dataArray['customer_email'];
            $customer->save();

            return back()->with('success', 'Data sukses di tambah!');
        }
        return back()->with('failed', 'Data gagal di tambah! ' . $jsonDecode->response_desc);
    }
}
