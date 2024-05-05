<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\smsGateway;
use App\Models\proyek;


class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'SMS Gateway';
        $data = smsGateway::all();
        return view('backend.sms.index',compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'SMS Gateway';
        $produk = proyek::all();
        return view ('backend.sms.create',compact('title','produk'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = smsGateway::find($id);
        $data->delete();
        return redirect('/sms');

    }

    // public function sendsms()
    // {
    //     $sid = getenv("TWILIO_SID");
    //     $token = getenv("TWILIO_TOKEN");
    //     $phone = getenv("TWILIO_PHONE");
    //     $twilio = new Client($sid, $token);

    //     $message = $twilio -> messages -> create("+62 858 8063 1562", // to
    //             [
    //         "body" => "This is the ship that made the Kessel Run in fourteen parsecs?",
    //         "from" => $phone
    //     ]);
    //     dd($message);
    // }

    public function sendSMS(Request $request)
    {   
        $token = "isi dengan api"; // Tambahkan tanda koma di sini
        $nomorPenerima = $request->input('penerima'); 
        $body = $request->input('pesan');

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
                'target' => $nomorPenerima,
                'message' => $body,
            )),
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $token,
            ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        
        $data = new smsGateway;
        $data->proyek_id = $request->input('proyek_id');
        $data ->tanggal = now();
        $data->pesan = $body;
        $data->penerima = $nomorPenerima;
        $data->save();

        // return $response;
        return redirect('/sms')->with('success','Pesan Berhasil Terkirim');

    }


}
