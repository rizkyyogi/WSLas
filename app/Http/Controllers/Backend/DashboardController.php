<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\proyek;
use App\Models\produk;
use App\Models\portofolio;
use App\Models\User;
class DashboardController extends Controller
{
    public function index()
    {
        $title= 'Dashboard';
        $user = User::all()->count();
        $produk = produk::all()->count();
        $proyek = proyek::all()->count();
        $portofolio = portofolio::all()->count();
        return view('backend.index',compact('title','user','proyek','portofolio','produk'));

    }
}
