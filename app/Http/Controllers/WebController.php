<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home(){
        return view('home-page');
    }

    public function product(){
        return view('product');
    }

    public function listCate(){
        return view('listCate');
    }

    public function listBrand(){
        return view('listBrand');
    }

    public function cart(){
        return view('cart');
    }

    public function checkout(){
        return view('checkout');
    }
}
