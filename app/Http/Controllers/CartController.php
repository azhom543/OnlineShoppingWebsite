<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user() == NULL && Auth::guard('admin') != NULL){
            $cartitems = DB::table('carts')->get();
            return view('cart.index')->with('cartitems', $cartitems);
        }else
        {
            $userid = Auth::user()->id;
            $cartitems = DB::table('carts')->where('user_id', $userid)->get();
            return view('cart.index')->with('cartitems', $cartitems);
        }
    }

    
    public function edit($id)
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }
        else{
        $userid = Auth::user()->id;
        $product=Product::find($id);
        $forminput = array(
            "Productname" => $product->name,
            "ProductDescription" => $product->description,
            "ProductSize" => $product ->size,
            "Price" => $product->price,
            "image" => $product->image,
            "user_id" => $userid
        );
        Cart::create($forminput);
        return back();
        }
    }
    

    public function destroy($id)
    {
        $cartitem = Cart::find($id);
        $cartitem->delete();
        return redirect()->back()->with('flash_message_error','Product Deleted');
    }
}