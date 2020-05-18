<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $shirts=Product::all();
        
        return view('front.home')->with('shirts',$shirts);
    }
    public function shirts()
    {
        $shirts=Product::all();
        return view('front.shirts')->with('shirts',$shirts);
    }
    public function shirt(Product $product)
    {
        return view('front.shirt')->with('product',$product);
    }
}
