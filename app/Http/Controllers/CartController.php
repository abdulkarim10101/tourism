<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariation;
use Illuminate\Http\Request;
use Session;
// use Illuminate\Contracts\Session\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Session::has('cart')) {
            return redirect(route('shop.shop'));
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $product_images=ProductImage::all();
        return view('frontend.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice,'product_images'=>$product_images]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        // dd($request->all());
        $product=Product::find($id);
        $oldcart=Session::has('cart') ? Session::get('cart') : null;
        $cart =new Cart($oldcart);
        if($request->qty==null){
            $request->qty=1;
        }
        if($product->type == 'variable'){
            $variationtotal=0;
            foreach($request->variations as $variation){
            $variationprice=ProductVariation::where('id',$variation)->first()->price;
            $variationtotal+=$variationprice;
            }
            $product->price+=$variationtotal;
            $cart->addVariableItem($product,$product->id,$request->qty,$request->variations);
        }
        else{
        $cart->add($product,$product->id,$request->qty);
        }

        Session::put('cart',$cart);
        return redirect()->back()->with(['message'=>'Product Added To Cart Successfully']);
        // dd(Session::get('cart'));
    }

    public function store1(Request $request)
    {
        // dd($request->all());
        $product=Product::find($request->product_id);
        $oldcart=Session::has('cart') ? Session::get('cart') : null;
        $cart =new Cart($oldcart);
        if($request->qty==null){
            $request->qty=1;
        }
        if($product->type == 'variable'){
            $variationtotal=0;
            foreach($request->variations as $variation){
            $variationprice=ProductVariation::where('id',$variation)->first()->price;
            $variationtotal+=$variationprice;
            }
            $product->price+=$variationtotal;
            $cart->addVariableItem($product,$product->id,$request->qty,$request->variations);
        }
        else{
        $cart->add($product,$product->id,$request->qty);
        }

        Session::put('cart',$cart);
        return response()->json([
            'success'=>true
        ]);
        // dd(Session::get('cart'));
    }

    public function getReduceByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function increaseByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->increaseByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getRemoveItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
