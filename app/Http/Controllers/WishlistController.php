<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlist=Wishlist::where('user_id',auth()->user()->id);
        return view('customer.wishlist',compact('wishlist'));
    }

    public function customerwishlist($id)
    {
        $wishlist=Wishlist::where('user_id',$id)->get();
        return view('admin.wishlist.index',compact('wishlist'));
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
    public function store(Request $request)
    {
        $wishlist=Wishlist::where('user_id',auth()->user()->id)->where('product_id',$request->product_id)->first();
        if($wishlist==null){
        Wishlist::create([
            'product_id'=>$request->product_id,
            'user_id'=>auth()->user()->id
        ]);
    }
    else{
        $wishlist->delete();
    }
        return response()->json([
            'success'=>true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wishlist=Wishlist::where('id',$id)->first();
        if($wishlist->user_id==auth()->user()->id){
            $wishlist->delete();
        }
        return redirect()->back();
    }
}
