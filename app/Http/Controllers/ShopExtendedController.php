<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class ShopExtendedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $featuredcategories;
    public function __construct()
    {
        $this->featuredcategories=ProductCategory::where('featured',1)->get();
    }


    public function index()
    {
        $featuredcategories=$this->featuredcategories;
        $products=Product::orderBy('featured')->paginate(25);
        return view('customer.shop.shopextended.index',compact('products','featuredcategories'));
    }

    public function search(Request $request)
    {
        $featuredcategories=$this->featuredcategories;
        $products=Product::where('name', 'like', '%' . $request->keyword . '%')->paginate(25);
        return view('customer.shop.shopextended.index',compact('products','featuredcategories'));
    }

    public function shopbycategory($id){
        $products=[];
        $featuredcategories=$this->featuredcategories;
        $category_id=$id;
        $products=Product::leftJoin('product_categories','product_categories.id','products.id')->where('category_id', $id)->select('products.*')->get();
        $category=ProductCategory::where('id',$id)->first();
        foreach($category->children as $item){
            $products=$products->merge(Product::leftJoin('product_categories','product_categories.id','products.id')->where('category_id', $item->id)->select('products.*')->get());
        }
        $item_per_page=25;
        $products = new LengthAwarePaginator($products->forPage(Paginator::resolveCurrentPage(), $item_per_page), count($products), $item_per_page, Paginator::resolveCurrentPage(), [
            'path' => Paginator::resolveCurrentPath()
          ]);
        // $products=$products->paginate(25);

        return view('customer.shop.shopextended.index',compact('products','featuredcategories','category_id'));
    }

    public function filterbyprice(Request $request){
        $featuredcategories=$this->featuredcategories;
        $category_id=$request->category_id;
        if($request->category_id!=null){
        $products=Product::leftJoin('product_categories','product_categories.id','products.id')->where('price','>=',$request->min)->where('price','<=',$request->max)->orWhere('special_price','<=',$request->max)->where('category_id', $request->category_id)->select('products.*')->paginate(25);

    }
    else{
        $products=Product::leftJoin('product_categories','product_categories.id','products.id')->where('price','>=',$request->min)->where('price','<=',$request->max)->select('products.*')->paginate(25);

    }
        return view('customer.shop.shopextended.index',compact('products','featuredcategories','category_id'));

    }
    // public function shopbycategory($id){
    //     $featuredcategories=$this->featuredcategories;
    //     $products=Product::where('price','>', $request->start_price)->where('price','<', $request->start_price)->select('products.*')->paginate(25);
    //     return view('customer.shop.shopextended.index',compact('products','featuredcategories'));
    // }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products=Product::where('categoty_id',$id)->get();
        return view('customer.shop.shopextended.index',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
