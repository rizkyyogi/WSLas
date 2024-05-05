<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\slider;
use App\Models\produk;
use App\Models\portofolio;
use App\Models\proyek;

class HomeController extends Controller
{
    public function index()
    {
        $slide=slider::all();
        $produk=produk::all();
        $porto=portofolio::all();
        $proyek=proyek::all();
        return view('frontend.index',compact('slide','produk','porto','proyek'));
    }

    public function proyek()
    {
        $proyek=proyek::all();
        return view('frontend.proyek',compact('proyek'));
    }
}
