<?php

namespace App\Http\Controllers;

use App\Models\ProductVariation;
use App\Models\ProductVariationCategory;
use Illuminate\Http\Request;

class ProductVariationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       ProductVariationCategory::create($request->all());
       return redirect()->back()->with('success','Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductVariationCategory  $productVariationCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productvariations=ProductVariation::where('category_id',$id)->get();
        $variationcategories=ProductVariationCategory::where('id',$id)->first();
        return view('admin.product_variation.index',compact('productvariations','variationcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductVariationCategory  $productVariationCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=ProductVariationCategory::where('id',$id)->first();
        return view('admin.product_variation_category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductVariationCategory  $productVariationCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $productVariationCategory=ProductVariationCategory::where('id',$id)->first();
        $productVariationCategory->update($request->except('_token','_method'));
        return redirect()->route('products.show',$productVariationCategory->product_id)->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductVariationCategory  $productVariationCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductVariationCategory $productVariationCategory)
    {
        $productVariationCategory->delete();
       return redirect()->back()->with('success','Deleted');

    }
}
