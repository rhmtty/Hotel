<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function customerTransaction($invoice = null, Request $request)
    {
        $keyword = $request->search_customer_trx;

        if ($keyword) {
            $trx = Booking::invoice($keyword);

            return view('transaction.transaction', compact('trx'));
        } elseif (!$keyword) {
            $trx = Booking::invoice($invoice);

            return view('transaction.transaction', compact('trx'));
        }

        // return view('transaction.transaction');
    }

    public function payment($invoice)
    {
        $trx = Booking::invoice($invoice);

        $payloads = [
            "username" => "LI307GXIN",
            "pin" => "2K2NPCBBNNTovgB",
            "bankcode" => $trx->kode_bank,
            "accountnumber" => "1234566788234",
            "amount" => $trx->amount,
            "partner_reff" => $trx->invoice
        ];

        $response = json_encode($payloads);
        dd($response);

        $isSuccess = ApiController::inquiryTransferBankAPI($response);
        $jsonDecode = json_decode($isSuccess);

        if ($jsonDecode->status == 'SUCCESS') {
            // $retail_payment = new Ewallet();
            // $retail_payment->amount = $request->amount;
            // $retail_payment->retail_code = $payloads['retail_code'];
            // $retail_payment->expired = $payloads['expired'];
            // $retail_payment->partner_reff = $payloads['partner_reff'];
            // $retail_payment->ewallet_phone = $payloads['ewallet_phone'];
            // $retail_payment->bill_title = $payloads['bill_title'];
            // $retail_payment->item_name = $payloads['item_name'];
            // $retail_payment->item_image_url = $payloads['item_image_url'];
            // $retail_payment->item_price = $payloads['item_price'];
            // $retail_payment->save();

            // $customer = new Pelanggan();
            // $customer->customer_id = $payloads['customer_id'];
            // $customer->customer_name = $payloads['customer_name'];
            // $customer->username = $payloads['username'];
            // $customer->pin = $payloads['pin'];
            // $customer->customer_phone = $payloads['customer_phone'];
            // $customer->customer_email = $payloads['customer_email'];
            // $customer->save();

            return back()->with('success', 'Data sukses di tambah! ' . $jsonDecode->response_desc);
        }
        return back()->with('failed', 'Data gagal di tambah! ' . $jsonDecode->response_desc);
    }
}
