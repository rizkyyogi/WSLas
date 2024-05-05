<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\proyek;
use App\Models\produk;
use App\Models\User;
use App\Models\smsGateway;
use App\Charts\AktualBiayaChart;
use ErrorException;
use Illuminate\Support\Facades\Session;
use Storage;
use Auth;
use PDF;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Proyek';
        $data = proyek::all();
        return view ('backend.proyek.index',compact('data','title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Proyek';
        $produk = produk::all();
        $data = proyek::all();
        return view ('backend.proyek.create',compact('title','produk','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $proyek = new proyek;
            $proyek->produk_id = $request->input('produk_id');
            $proyek->user_id = Auth::user()->id;
            $proyek->nama_proyek = $request->input('nama_proyek');
            $proyek->nama_pelanggan = $request->input('nama_pelanggan');
            $proyek->telp = $request->input('telp');
            $proyek->lokasi = $request->input('lokasi');
            $proyek->status = $request->input('status');

            $proyek->modal = $request->modal;
            $proyek->harga_jual = $request->harga_jual;
            $proyek->keuntungan = $request->harga_jual - $request->modal;
            $proyek->detail = $request->detail;
            $proyek->bar_progress = $request->bar_progress;

            // Loop untuk mengunggah gambar ke 10 kolom galeri
            for ($i = 1; $i <= 3; $i++) {
                $kolom_galeri = 'galeri' . $i;
                if ($request->hasFile($kolom_galeri) && $request->file($kolom_galeri)->isValid()) {
                    $image = $request->file($kolom_galeri);
                    $nama = time() . "_galeri" . $i . "_" . $image->getClientOriginalName();
                    $tujuan_upload = public_path('images/proyek');
                    $image->move($tujuan_upload, $nama);
                    $proyek->$kolom_galeri = $nama;
                } else {
                    // Jika gambar tidak diunggah, atur kolom galeri menjadi null
                    $proyek->$kolom_galeri = null;
                }
            }

            $proyek->save();
            if($proyek)
            {
                $token = "isi dengan APi"; // Tambahkan tanda koma di sini
                $nomorPenerima = $request->input('telp'); 
                $body = 'tes proyek';
        
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
                $data->proyek_id = $proyek->id;
                $data ->tanggal = now();
                $data->pesan = $body;
                $data->penerima = $nomorPenerima;
                $data->save();        
            }


            return redirect('/proyek')->with('success', 'Data Proyek berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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
        $title = 'Proyek';
        $data = proyek::find($id);
        $produk = produk::all();
        return view('backend.proyek.edit',compact('title','data','produk'));
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
        try {
            $proyek = proyek::find($id);
            $proyek->produk_id = $request->input('produk_id');
            $proyek->user_id = Auth::user()->id;
            $proyek->nama_proyek = $request->input('nama_proyek');
            $proyek->nama_pelanggan = $request->input('nama_pelanggan');
            $proyek->telp = $request->input('telp');
            $proyek->lokasi = $request->input('lokasi');
            $proyek->status = $request->input('status');

            $proyek->modal = $request->modal;
            $proyek->harga_jual = $request->harga_jual;
            $proyek->keuntungan = $request->harga_jual - $request->modal;
            $proyek->detail = $request->detail;
            $proyek->bar_progress = $request->bar_progress;

            // Loop untuk mengunggah gambar ke 10 kolom galeri
            for ($i = 1; $i <= 3; $i++) {
                $kolom_galeri = 'galeri' . $i;
                if ($request->hasFile($kolom_galeri) && $request->file($kolom_galeri)->isValid()) {
                    $image = $request->file($kolom_galeri);
                    $nama = time() . "_galeri" . $i . "_" . $image->getClientOriginalName();
                    $tujuan_upload = public_path('images/proyek');
                    $image->move($tujuan_upload, $nama);
                    $proyek->$kolom_galeri = $nama;
                } else {
                    // Jika gambar tidak diunggah, atur kolom galeri menjadi null
                    $proyek->$kolom_galeri = null;
                }
            }

            $proyek->save();
            if($proyek)
            {
                $token = "c7i2Tb3emBuWGpsKM-NT"; // Tambahkan tanda koma di sini
                $nomorPenerima = $request->input('telp'); 
                $body = 'hello pelanggan setia,

Ayo cek progress proyekmu disini ----bit.ly
                
-Workshop Mas Mari-';

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
                $data->proyek_id = $proyek->id;
                $data ->tanggal = now();
                $data->pesan = $body;
                $data->penerima = $nomorPenerima;
                $data->save();        
            }

            return redirect('/proyek')->with('success', 'Data Proyek berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data =proyek::find($id);
        $data ->delete();
        return redirect ('/proyek');
    }

    public function cetak_pdf()
    {
        $proyek = proyek::all();
        $totaljual = $proyek->sum('harga_jual');
        $totallaba = $proyek->sum('keuntungan');
        $pdf = PDF::loadview('backend.proyek.download',['proyek'=>$proyek,'totaljual' => $totaljual,'totallaba' => $totallaba]);
        return $pdf->download('laporan_proyek_2024_pdf');
    }

    public function detail(AktualBiayaChart $chart, $id)
    {
        $title = 'Detail Proyek';
        $type = 'fitur';
        $data = proyek::find($id);
        $chart = $chart->build($id);
        // return $data;
        return view ('backend.proyek.detail',compact('title', 'data','type','chart'));
    }

    public function unduh($id)
    {
        $data = proyek::find($id);
        $pdf = PDF::loadview('backend.proyek.unduh',['data'=>$data]);
        return $pdf->download('laporan_proyek_pdf');
    }
}
