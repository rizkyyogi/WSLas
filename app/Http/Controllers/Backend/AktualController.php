<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AktualBiaya;
use App\Models\proyek;

class AktualController extends Controller
{
    public function index()
    {
        $title = 'Aktual & Biaya';
        $data = AktualBiaya::all();
        return view ('backend.proyek.index-aktual',compact('title','data'));
    }

    public function create()
    {
        $title = 'Aktual & Biaya';
        $data = proyek::all();
        return view('backend.proyek.aktual',compact('data','title'));
    }

    public function store(Request $request)
    {
        $aktual = new AktualBiaya;
        $aktual ->proyek_id = $request->proyek_id;
        $aktual ->tanggal = $request->tanggal;
        $aktual ->aktual = $request->aktual;
        $aktual ->biaya = $request->biaya;

        $aktual ->save();
        return redirect()->route('aktual')->with('success','Data Berhasil Ditambahkan');

        // return $aktual;
    }

    public function destroy($id)
    {
        $data = AktualBiaya::find($id);
        $data ->delete();
        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
