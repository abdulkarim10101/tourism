<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function (Request $request, $next) {
            if (auth()->user()->role_id != 1) {
                return redirect()->route('shop.index');
            }

            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promocodes=PromoCode::paginate(25);
        return view('admin.promocodes.index',compact('promocodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promocodes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PromoCode::create($request->all());
        return redirect()->route('promocodes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PromoCode  $promoCode
     * @return \Illuminate\Http\Response
     */
    public function show(PromoCode $promoCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PromoCode  $promoCode
     * @return \Illuminate\Http\Response
     */
    public function edit(PromoCode $promocode)
    {
        return view('admin.promocodes.edit',compact('promocode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PromoCode  $promoCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $promoCode=PromoCode::find($id);
        $promoCode->update($request->all());
        return redirect()->route('promocodes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PromoCode  $promoCode
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promoCode=PromoCode::find($id);
        $promoCode->delete();
        return redirect()->back();
    }
}
