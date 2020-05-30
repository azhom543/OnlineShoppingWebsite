<?php

namespace App\Http\Controllers;
use App\Product;
use App\Cart;
use Auth;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $shirts=Product::all();
        return view('front.home')->with('shirts',$shirts);
    }
    public function shirts()
    {
        $var = Auth::guard('admin')->check();
        $shirts=Product::all();
        if(Auth::user() == NULL){
            if(Auth::guard('admin')->check() == NULL){
                return redirect()->route('login');
            }else
            {
                $count = 0;
                return view('front.shirts')->with(['shirts'=>$shirts, 'count'=>$count]);
            }
        }else
        {
            $userid = Auth::user()->id;
            $count = DB::table('carts')->where('user_id', $userid)->count();
            return view('front.shirts')->with(['shirts'=>$shirts, 'count'=>$count]);
        }
    }
    public function shirt(Product $product)
    {
        return view('front.shirt')->with('product',$product);
    }
}
