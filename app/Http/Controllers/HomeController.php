<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function landingpage()
    {
        return view('pages.enduser.landing_page');
    }
    

    public function katalog(){
        $data = Product::with(['fotos', 'varians', 'beratJenis'])->get();
        return view('pages.enduser.katalog',compact('data'));
    }

    public function detailProduct($id){
        $data = Product::with(['fotos', 'varians', 'beratJenis'])->findOrFail($id);
        $berat_jenis = $data->beratJenis;
        return view('pages.enduser.detailproduct',compact('data','berat_jenis'));
    }
    
}
