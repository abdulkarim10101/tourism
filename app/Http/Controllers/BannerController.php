<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // dd('hello');
            if (auth()->user()->role_id != 'admin' && auth()->user()->role_id != 'super_admin') {
                return redirect()->route('shop.index')->withFlashMessage('You are not authorized to access that page.')->withFlashType('warning');
            }
            return $next($request);
        });
    }
    public function index()
    {
        $banners=Banner::leftJoin('product_categories','product_categories.id','frontend_banners.category_id')
        ->select('product_categories.name as category_name','frontend_banners.*')
        ->get();
        return view('admin.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=ProductCategory::all();
        return view('admin.banner.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $a=md5(rand(1,11));
        // dd($request->all());
        $image=$request->file('image');
        $nameonly=preg_replace('/\..+$/', '', $image->getClientOriginalName());
        $filename=$nameonly.'_'.$a.'.'.$image->getClientOriginalExtension();
        $image->move('front_banners',$filename);
        Banner::create($request->all()+['banner'=>$filename]);

        return redirect()->route('banners.index')->with('danger','deleted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=ProductCategory::all();
        $banner=Banner::find($id);
        return view('admin.banner.edit',compact('banner','categories'));
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
        Banner::find($id)->update($request->all());
        return redirect()->route('banners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::where('id',$id)->delete();
        return redirect()->back()->with('danger','deleted');
    }
}
