<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function inquiryTransferBank()
    {
        $dataArray = [
            "username" => "LI307GXIN",
            "pin" => "2K2NPCBBNNTovgB",
            "bankcode" => "008",
            "accountnumber" => "1234566788234",
            "amount" => 50000,
            "partner_reff" => 12345567
        ];
    }
}
