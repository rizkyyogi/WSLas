<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\portofolio;
use ErrorException;
use Illuminate\Support\Facades\Session;
use Storage;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Portofolio';
        $data = portofolio::all();
        return view('backend.porto.index',compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Portofolio';
        return view ('backend.porto.create',compact('title'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
            try {
                $image = $request->file('gambar');
                $nama = time() . "_" . $image->getClientOriginalName();
                $tujuan_upload = public_path().'\images\porto';
                $image->move($tujuan_upload, $nama);
                // $requestData["photo"]= '/storage'.$nama;
                $porto = new portofolio;
                $porto->nama = $request->input('nama');
                $porto->gambar = $nama;
                $porto->save();
                
                Session::flash('success', 'Data porto Berhasil ditambah!');
                return redirect('/porto');
                // return $porto;
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        } else {
            return "ubah photo mu ke file png";
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
        $title = 'Portofolio';
        $data = portofolio::find($id);
        return view('backend.porto.edit',compact('title','data'));

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
        if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
            try {
                $image = $request->file('gambar');
                $nama = time() . "_" . $image->getClientOriginalName();
                $tujuan_upload = public_path().'\images\porto';
                $image->move($tujuan_upload, $nama);
        
                // Ambil porto yang akan diupdate
                $porto = portofolio::find($id);
        
                // Cek jika porto ada
                if (!$porto) {
                    return redirect('/porto')->with('error', 'porto tidak ditemukan');
                }
        
                // Hapus gambar lama jika ada
                if ($porto->gambar) {
                    Storage::delete('public/images/porto/' . $porto->gambar);
                }
        
                // Update data porto
                $porto->nama = $request->input('nama');
                $porto->gambar = $nama;
                $porto->save();
        
                Session::flash('success', 'Data porto Berhasil diubah!');
                return redirect('/porto');
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        } else {
            return "Ubah foto Anda ke file PNG";
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
        $data = portofolio::find($id);
        $data ->delete();
        return redirect ('/porto');

    }
}
