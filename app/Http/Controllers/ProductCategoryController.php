<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductInCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ProductCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function (Request $request, $next) {
            if(auth()->user()->role_id!=1){
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
    public function index(Request $request)
    {
        // $categories=ProductCategory::paginate(25);

        if (!$request->keyword) {
            $categories = ProductCategory::where('parent_id', null)->orderBy('created_at', 'desc')->paginate(25);
        } else {
            $search = $request->keyword;
            $categories = ProductCategory::where('parent_id', null)->where('name', 'like', '%' . $search . '%')->orderBy('created_at', 'desc');
            $categories = $categories->paginate(25)->setPath('');
            $pagination = $categories->appends(array(
                'keyword' => $request->keyword
            ));
        }

        return view('admin.product_category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=ProductCategory::all();
        return view('admin.product_category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $slug=str_ireplace(' ','-',$request->name);
        $category=ProductCategory::create($request->all()+['slug'=>$slug]);

        $filename='noimage.jpg';
        $image= $request->file('image');
            $a = \Str::random(5);
            $destinationPath = 'file/'; // upload path
            $nameonly = preg_replace('/\..+$/', '', $image->getClientOriginalName());
            $filename = $nameonly . '_' . $a . '_' . '.' . $image->getClientOriginalExtension();
            $image->move('image', $filename);
            // $path = $image->storeAs('student_files',$nameonly.'_'.$a.'.'.$image->getClientOriginalExtension(), 'app/public/licenses');
            $category->update(['image' => URL::to('/image').'/'.$filename]);

        return redirect()->back()->with('success','Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=ProductCategory::where('id',$id)->first();
        $categories=ProductCategory::all();
        // return response()->json([
        //     'category'=>$category
        // ]);

        return view('admin.product_category.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
    //     $filename=null;
    //     $filename1=null;
    //     $a=uniqid();
    //     if($request->hasFile('image')){
    //     $video=$request->file('image');
    //     $nameonly=preg_replace('/\..+$/', '', $video->getClientOriginalName());
    //     $filename=$nameonly.'_'.$a.'.'.$video->getClientOriginalExtension();
    //     $filename1=$filename;
    //     $video->move('categoryimages',$filename);
    // }
    // dd($filename);
        $category=ProductCategory::find($id);
        $category->update($request->except('image'));

        return redirect()->route('categories.index')->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductCategory::where('id',$id)->delete();
        ProductInCategory::where('category_id',$id)->delete();
        Product::where('category_id',$id)->delete();
        return redirect()->back()->with('danger','Deleted');
    }
}
