<?php

namespace App\Http\Controllers;

class MemberController extends Controller
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

    public static function getDataBank()
    {
        $data_bank = self::fetchAPI('/linkqu-partner/masterbank/list');
        return $data_bank['data'];
    }

    public static function getDataEmoney($username = 'LI801D8G7')
    {
        $data_emoney = self::fetchAPI('/linkqu-partner/data/emoney?username=' . $username);

        foreach ($data_emoney['data'] as $data) {
            return $data;
        }
    }

    public static function getResumeAccount($username = 'LI801D8G7')
    {
        $data_resumeAccount = self::fetchAPI('/linkqu-partner/akun/resume?username=' . $username);
        return $data_resumeAccount['data'];
    }

    public function index()
    {
        $data_bank = self::getDataBank();
        $data_emoney = self::getDataEmoney();
        $data_resumeAccount = self::getResumeAccount();
        // dd($data_resumeAccount);

        return view('member.index', compact('data_bank', 'data_emoney', 'data_resumeAccount'));
    }
}
