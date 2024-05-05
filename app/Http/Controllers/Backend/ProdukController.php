<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\produk;
use ErrorException;
use Illuminate\Support\Facades\Session;
use Storage;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Produk';
        $data = produk::all();
        return view ('backend.produk.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Produk';
        return view ('backend.produk.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('foto_produk') && $request->file('foto_produk')->isValid()) {
            try {
                $image = $request->file('foto_produk');
                $nama = time() . "_" . $image->getClientOriginalName();
                $tujuan_upload = public_path().'\images\produk';
                $image->move($tujuan_upload, $nama);
                // $requestData["photo"]= '/storage'.$nama;
                $slide = new produk;
                $slide->nama_produk = $request->input('nama_produk');
                $slide->foto_produk = $nama;
                $slide->description = $request->input('description');
                $slide->save();
                
                Session::flash('success', 'Data Produk Berhasil ditambah!');
                return redirect('/produk');
                // return $slide;
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
        $title = 'Produk';
        $data = produk::find($id);
        return view('backend.produk.edit',compact('title','data'));
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
        if ($request->hasFile('foto_produk') && $request->file('foto_produk')->isValid()) {
            try {
                $image = $request->file('foto_produk');
                $nama = time() . "_" . $image->getClientOriginalName();
                $tujuan_upload = public_path().'\images\produk';
                $image->move($tujuan_upload, $nama);
        
                // Ambil slide yang akan diupdate
                $slide = produk::find($id);
        
                // Cek jika slide ada
                if (!$slide) {
                    return redirect('/slide')->with('error', 'Produk tidak ditemukan');
                }
        
                // Hapus foto_produk lama jika ada
                if ($slide->foto_produk) {
                    Storage::delete('public/images/produk/' . $slide->foto_produk);
                }
        
                // Update data slide
                $slide->nama_produk = $request->input('nama_produk');
                $slide->foto_produk = $nama;
                $slide->description = $request->input('description');
                $slide->save();
        
                Session::flash('success', 'Data Slide Berhasil diubah!');
                return redirect('/produk');
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
        $data = produk::find($id);
        $data->delete();
        return redirect ('/produk');
    }
}
