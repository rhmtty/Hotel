<?php

namespace App\Http\Controllers;

use App\Ewallet;
use App\Pelanggan;
use App\RetailPayment;
use App\VirtualAccount;
use Illuminate\Http\Request;

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

    // public function postRegister(Request $request)
    // {
    //     // $retail_payment = ApiController::createRetailPaymentAPI();

    //     $pelanggan = new Pelanggan();
    //     $pelanggan->customer_id = uniqid();
    //     $pelanggan->customer_name = $request->customer_name;
    //     $pelanggan->username = $request->username;
    //     // $pelanggan->pin = $request->pin;
    //     $pelanggan->customer_phone = $request->customer_phone;
    //     $pelanggan->customer_email = $request->customer_email;
    //     $pelanggan->no_ktp = $request->ktp;
    //     $pelanggan->customer_address = $request->customer_address;
    //     $pelanggan->password = bcrypt($request->password);
    //     $pelanggan->jenis_kelamin = $request->jenis_kelamin;
    //     $pelanggan->save();

    //     return back()->with('success', 'Data pelanggan berhasil di tambah!');
    // }

    public function newBooking()
    {
        $data_bank = ApiController::getDataBankAPI();
        $data_emoney = ApiController::getDataEmoneyAPI();
        $data_resumeAccount = ApiController::getResumeAccountAPI();

        return view('customer.form', compact('data_bank', 'data_emoney', 'data_resumeAccount'));
    }

    public function createVirtualAccountPermata()
    {
        return view('customer.vapermata');
    }

    public function postVirtualAccountPermata(Request $request)
    {
        $dataArray = [
            "amount" => $request->amount,
            "partner_reff" => "20051911581337688007",
            "transaction_amount" => $request->amount,
            "customer_id" => uniqid(),
            "customer_name" => $request->customer_name,
            "expired" => "20221123230000",
            "username" => "LI307GXIN",
            "pin" => $request->pin,
            "customer_phone" => $request->customer_phone,
            "customer_email" => $request->customer_email,
            "bank_code" => $request->bank_code
        ];

        $response = json_encode($dataArray);

        // UNTUK MEGECEK APABILA DATA SUKSES 
        $isSuccess = ApiController::createVirtualAccountPermataAPI($response);
        $jsonDecode = json_decode($isSuccess);

        if ($jsonDecode->status == 'SUCCESS') {
            $virtual_account = new VirtualAccount();
            $virtual_account->amount = $request->amount;
            $virtual_account->bank_code = $request->bank_code;
            $virtual_account->expired = $dataArray['pin'];
            $virtual_account->partner_reff = $request->partner_reff;
            $virtual_account->transaction_amount = $request->amount;
            $virtual_account->save();

            $customer = new Pelanggan();
            $customer->customer_id = $dataArray['customer_id'];
            $customer->customer_name = $dataArray['customer_name'];
            $customer->username = $dataArray['username'];
            $customer->pin = $dataArray['pin'];
            $customer->customer_phone = $dataArray['customer_phone'];
            $customer->customer_email = $dataArray['customer_email'];
            $customer->save();

            return back()->with('success', 'Data sukses di tambah! ' . $jsonDecode->response_desc);
        }
        return back()->with('failed', 'Data gagal di tambah! ' . $jsonDecode->response_desc);
    }

    public function createVirtualAccount()
    {
        return view('customer.vaForm');
    }

    public function postVirtualAccount(Request $request)
    {
        $dataArray = [
            "amount" => $request->amount,
            "partner_reff" => "200702083951337712007",
            "customer_id" => uniqid(),
            "customer_name" => $request->customer_name,
            "expired" => "20211231130000",
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

        if ($jsonDecode->status == 'SUCCESS') {
            $virtual_account = new VirtualAccount();
            $virtual_account->amount = $request->amount;
            $virtual_account->bank_code = $request->bank_code;
            $virtual_account->expired = $dataArray['pin'];
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

            return back()->with('success', 'Data sukses di tambah! ' . $jsonDecode->response_desc);
        }
        return back()->with('failed', 'Data gagal di tambah! ' . $jsonDecode->response_desc);
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

            return back()->with('success', 'Data sukses di tambah!' . $jsonDecode->response_desc);
        }
        return back()->with('failed', 'Data gagal di tambah! ' . $jsonDecode->response_desc);
    }

    public function createQrisImage()
    {
        return view('customer.qris');
    }

    public function postQrisImage(Request $request)
    {
        $dataArray = [
            "amount" => $request->amount,
            "partner_reff" => "20010208395256271148",
            "customer_id" => uniqid(),
            "customer_name" => $request->customer_name,
            "expired" => "20220402230000",
            "username" => "LI307GXIN",
            "pin" => $request->pin,
            "customer_phone" => $request->customer_phone,
            "customer_email" => $request->customer_email
        ];

        $response = json_encode($dataArray);
        // UNTUK MEGECEK APABILA DATA SUKSES 
        $isSuccess = ApiController::createQrisImageAPI($response);
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

            return back()->with('success', 'Data sukses di tambah! ' . $jsonDecode->response_desc . ' Silahkan akses url berikut: ' . $jsonDecode->imageqris);
        }
        return back()->with('failed', 'Data gagal di tambah! ' . $jsonDecode->response_desc);
    }

    public function createEwallet()
    {
        return view('customer.ewallet');
    }

    public function postEwallet(Request $request)
    {
        $dataArray = [
            "amount" => $request->amount,
            "partner_reff" => "20010208395256276661",
            "customer_id" => uniqid(),
            "customer_name" => $request->customer_name,
            "expired" => "20220609230000",
            "username" => "LI307GXIN",
            "pin" => $request->pin,
            "retail_code" => $request->retail_code,
            "customer_phone" => $request->customer_phone,
            "customer_email" => $request->customer_email,
            "ewallet_phone" => $request->ewallet_phone,
            "bill_title" => "Payment Order 0000001",
            "item_name" => ["Apple", "Banana"],
            "item_image_url" => ["https://linkqu.id/logo.png", "https://linkqu.id/logo.png"],
            "item_price" => [50000, 15000]
        ];

        $response = json_encode($dataArray);

        $isSuccess = ApiController::createEwalletAPI($response);
        $jsonDecode = json_decode($isSuccess);

        if ($jsonDecode->status == 'SUCCESS') {
            $retail_payment = new Ewallet();
            $retail_payment->amount = $request->amount;
            $retail_payment->retail_code = $dataArray['retail_code'];
            $retail_payment->expired = $dataArray['expired'];
            $retail_payment->partner_reff = $dataArray['partner_reff'];
            $retail_payment->ewallet_phone = $dataArray['ewallet_phone'];
            $retail_payment->bill_title = $dataArray['bill_title'];
            $retail_payment->item_name = $dataArray['item_name'];
            $retail_payment->item_image_url = $dataArray['item_image_url'];
            $retail_payment->item_price = $dataArray['item_price'];
            $retail_payment->save();

            $customer = new Pelanggan();
            $customer->customer_id = $dataArray['customer_id'];
            $customer->customer_name = $dataArray['customer_name'];
            $customer->username = $dataArray['username'];
            $customer->pin = $dataArray['pin'];
            $customer->customer_phone = $dataArray['customer_phone'];
            $customer->customer_email = $dataArray['customer_email'];
            $customer->save();

            return back()->with('success', 'Data sukses di tambah! ' . $jsonDecode->response_desc);
        }
        return back()->with('failed', 'Data gagal di tambah! ' . $jsonDecode->response_desc);
    }
}
