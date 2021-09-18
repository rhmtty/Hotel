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

    public function payment(Request $request, $invoice)
    {
        $trx = Booking::invoice($invoice);

        if ($request->isMethod('POST')) {
            $payloads = [
                "username" => $request->username,
                "pin" => $request->pin,
                "bankcode" => $trx->kode_bank,
                "accountnumber" => $request->accountNumber,
                "amount" => $trx->amount,
                "partner_reff" => $trx->invoice
            ];

            $response = json_encode($payloads);
            $isSuccess = ApiController::inquiryTransferBankAPI($response);
            $jsonDecode = json_decode($isSuccess);

            if ($jsonDecode->status == '') {
                $dataTf = [
                    "username" => $payloads['username'],
                    "pin" => $payloads['pin'],
                    "bankcode" => $payloads['bankcode'],
                    "accountnumber" => $payloads['accountnumber'],
                    "amount" => $payloads['amount'],
                    "partner_reff" => $payloads['partner_reff'],
                    "inquiry_reff" => "70291"
                ];

                $response = json_encode($dataTf);
                $isSuccess = ApiController::paymentTfBankAPI($response);
                $jsonDecode = json_decode($isSuccess);

                $booking = Booking::where('invoice', $invoice)->first();
                $booking->exists = true;
                $booking->status = $jsonDecode->status;
                $booking->update();

                return back()->with('success', 'Pembayaran ' . $jsonDecode->response_desc . '!');
            }
            return back()->with('failed', 'Pembayaran gagal ' . $jsonDecode->response_desc . '!');
        }

        return view('transaction.payment', compact('trx'));
    }

    public function checkTrxStatus(Request $request)
    {
    }
}
