<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\slider;
use ErrorException;
use Illuminate\Support\Facades\Session;
use Storage;


class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Slide';
        $data =slider::all();
        return view ('backend.slide.index',compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Slide';
        return view ('backend.slide.create',compact('title'));
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
                $tujuan_upload = public_path().'\images\slide';
                $image->move($tujuan_upload, $nama);
                // $requestData["photo"]= '/storage'.$nama;
                $slide = new slider;
                $slide->name = $request->input('name');
                $slide->gambar = $nama;
                $slide->save();
                
                Session::flash('success', 'Data Slide Berhasil ditambah!');
                return redirect('/slide');
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
        $title = 'Slide';
        $data = slider::find($id);
        return view('backend.slide.edit',compact('title','data'));
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
                $tujuan_upload = public_path().'\images\slide';
                $image->move($tujuan_upload, $nama);
        
                // Ambil slide yang akan diupdate
                $slide = slider::find($id);
        
                // Cek jika slide ada
                if (!$slide) {
                    return redirect('/slide')->with('error', 'Slide tidak ditemukan');
                }
        
                // Hapus gambar lama jika ada
                if ($slide->gambar) {
                    Storage::delete('public/images/slide/' . $slide->gambar);
                }
        
                // Update data slide
                $slide->name = $request->input('name');
                $slide->gambar = $nama;
                $slide->save();
        
                Session::flash('success', 'Data Slide Berhasil diubah!');
                return redirect('/slide');
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
        $data = slider::find($id);
        $data ->delete();
        return redirect ('/slide');
    }
}
