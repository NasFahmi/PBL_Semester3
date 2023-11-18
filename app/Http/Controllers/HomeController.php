<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function landingpage()
    {
        return view('pages.enduser.landing_page');
    }
    

    public function katalog(){
        return view('pages.enduser.katalog');
    }

    public function detailProduct($id){
        return view('pages.enduser.detailproduct');
    }
    
}
