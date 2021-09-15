<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function inquiryTransferBank(Request $request)
    {
        $username_customer = Pelanggan::where('');
        dd($username_customer);

        $dataArray = [
            "username" => "LI307GXIN",
            "pin" => "2K2NPCBBNNTovgB",
            "bankcode" => "008",
            "accountnumber" => "1234566788234",
            "amount" => 50000,
            "partner_reff" => 12345567
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
