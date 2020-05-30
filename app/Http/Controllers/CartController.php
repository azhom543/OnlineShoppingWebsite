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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    public function addItem($id)
    {
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cartitem = Cart::find($id);
        $cartitem->delete();
        return redirect()->back()->with('flash_message_error','Product Deleted');
    }
}