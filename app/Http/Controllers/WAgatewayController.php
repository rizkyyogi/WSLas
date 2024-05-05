<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WAgatewayController extends Controller
{
    public function sendWA()
    {
        $target = "isi dengan nomor";
        $token = "isi dengan api"; // Tambahkan tanda koma di sini
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query(array(
                'target' => $target,
                'message' => 'test message',
            )),
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $token,
            ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        
        return $response;
            }

}
