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

        if ($data_bank) {
            return $data_bank['data'];
        }

        return 'Tidak dapat fetch data ke API';
    }

    public static function getDataEmoneyAPI($username = 'LI801D8G7')
    {
        $data_emoney = self::fetchAPI('/linkqu-partner/data/emoney?username=' . $username);

        if ($data_emoney) {
            foreach ($data_emoney['data'] as $data) {
                return $data;
            }
        }

        return 'Tidak dapat fetch data ke API';
    }

    public static function getResumeAccountAPI($username = 'LI801D8G7')
    {
        $data_resumeAccount = self::fetchAPI('/linkqu-partner/akun/resume?username=' . $username);
        return $data_resumeAccount['data'];
    }

    public static function createVirtualAccountPermataAPI($data)
    {
        $url_api = 'https://gateway-dev.linkqu.id';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url_api . '/linkqu-partner/transaction/create/vapermata',
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

    public static function createQrisImageAPI($data)
    {
        $url_api = 'https://gateway-dev.linkqu.id';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url_api . '/linkqu-partner/transaction/create/qris',
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

    public static function createEwalletAPI($data)
    {
        $url_api = 'https://gateway-dev.linkqu.id';

        $response = json_decode($data);

        if ($response->retail_code == 'PAYOVO') {
            $url_endpoint = $url_api . '/linkqu-partner/transaction/create/ovopush';
        } elseif ($response->retail_code == 'PAYDANA') {
            $url_endpoint = $url_api . '/linkqu-partner/transaction/create/paymentewallet';
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url_endpoint,
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

    // public static function callbackTrxReceived(){
    //     $url_api = 'https://gateway-dev.linkqu.id';

    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => $url_api.'/linkqu-partner/transaction/withdraw/payment',
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'POST',
    //         CURLOPT_POSTFIELDS => '{
    //             "amount": 10000,
    //             "serialnumber": "41233",
    //             "type": "pay",
    //             "payment_reff": 51233,
    //             "va_code": "PAYDANA",
    //             "partner_reff": "123123123",
    //             "partner_reff2": "5123123123",
    //             "additionalfee": 1500,
    //             "balance": 890000,
    //             "credit_balance": 10000,
    //             "transaction_time": "2020-01-04 14:16:58",
    //             "payment_id": "313287586",
    //             "customer_name": "OK",
    //             "username": "XXXXXX",
    //             "status": "SUCCESS"
    //         }',
    //         CURLOPT_HTTPHEADER => array(
    //             'Content-Type: application/json',
    //             'client-id: testing',
    //             'client-secret: 123'
    //         ),
    //     ));

    //     $response = curl_exec($curl);

    //     curl_close($curl);
    //     echo $response;
    // }

    public static function  inquiryTransferBankAPI($data)
    {
        $url_api = 'https://gateway-dev.linkqu.id';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url_api . '/linkqu-partner/transaction/withdraw/inquiry',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'client-id: testing',
                'client-secret: 123'
            ),
        ));
        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}
