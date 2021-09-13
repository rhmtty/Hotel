<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public static function fetchAPI($url_endpoint)
    {
        $url_api = 'https://gateway-dev.linkqu.id';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url_api . $url_endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'client-id: testing',
                'client-secret: 123'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response, true);
        return $response;
    }

    public static function getDataBankAPI()
    {
        $data_bank = self::fetchAPI('/linkqu-partner/masterbank/list');
        return $data_bank['data'];
    }

    public static function getDataEmoneyAPI($username = 'LI801D8G7')
    {
        $data_emoney = self::fetchAPI('/linkqu-partner/data/emoney?username=' . $username);

        foreach ($data_emoney['data'] as $data) {
            return $data;
        }
    }

    public static function getResumeAccountAPI($username = 'LI801D8G7')
    {
        $data_resumeAccount = self::fetchAPI('/linkqu-partner/akun/resume?username=' . $username);
        return $data_resumeAccount['data'];
    }

    public static function createVirtualAccountAPI($data)
    {
        $url_api = 'https://gateway-dev.linkqu.id';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url_api . '/linkqu-partner/transaction/create/va',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "amount" : 25000,
                "partner_reff" : "200102083952562712182",
                "customer_id" : "31857118",
                "customer_name" : "GPI",
                "expired" : "20211231230000",
                "username" : "LI307GXIN",
                "pin" : "2K2NPCBBNNTovgB",
                "customer_phone" : "081231857418",
                "customer_email" : "cto@linkqu.id",
                "bank_code" : "947"
            }',
            CURLOPT_HTTPHEADER => array(
                'client-id: test',
                'client-secret: test213'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public static function createRetailPaymentAPI($data)
    {
        $url_api = 'https://gateway-dev.linkqu.id';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url_api . '/linkqu-partner/transaction/create/retail',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                'client-id: testing',
                'client-secret: 123'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}
