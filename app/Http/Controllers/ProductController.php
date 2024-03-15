<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductInCategory;
use App\Models\ProductVariationCategory;
use App\Models\ProductVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
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
        $products = Product::paginate(25);
        if($request->category){
            $search=$request->category;
            $products = Product::orderBy('created_at', 'desc');
            $products->WhereHas('category', function ($query) use ($search) {
                $query->where('name',$search);
            })->paginate(25)->setPath('');
            $pagination = $products->appends(array(
                'keyword' => $request->keyword
            ));
        }
        if (!$request->keyword) {
            $products = Product::orderBy('created_at', 'desc')->paginate(25);
        } else {
            $search=$request->keyword;
            $products = Product::where('name', 'like', '%' . $request->keyword . '%')
                ->orWhere('price', 'like', '%' . $request->keyword . '%')
                ->orWhere('id', 'like', '%' . $request->keyword . '%')
                ->orWhere('slug', 'like', '%' . $request->keyword . '%')
                ->orWhere('sku', 'like', '%' . $request->keyword . '%')
                ->orWhere('description', 'like', '%' . $request->keyword . '%')
                ->orWhereHas('category', function ($query) use ($search) {
                    $query->where('name',$search);
                })
                ->paginate(25)->setPath('');
            $pagination = $products->appends(array(
                'keyword' => $request->keyword
            ));
        }

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin.product.create', compact('categories'));
    }

    public function aliexpress(){
        $categories=ProductCategory::all();
        return view('admin.product.aliexpress',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = str_ireplace(' ', '-', $request->name);
        $product = Product::create($request->all());
        $category = ProductCategory::find($request->category_id);
        while ($category->parent_id != null) {
            ProductInCategory::create([
                'category_id' => $category->id,
                'product_id' => $product->id,
            ]);
            $category = ProductCategory::find($category->parent_id);
        }
        ProductInCategory::create([
            'category_id' => $category->id,
            'product_id' => $product->id,
        ]);
        $filename='noimage.jpg';
        foreach ($request->file('main_images') as $image) {
            $a = \Str::random(5);
            $destinationPath = 'file/'; // upload path
            $nameonly = preg_replace('/\..+$/', '', $image->getClientOriginalName());
            $filename = $nameonly . '_' . $a . '_' . '.' . $image->getClientOriginalExtension();
            $image->move('image', $filename);
            // $path = $image->storeAs('student_files',$nameonly.'_'.$a.'.'.$image->getClientOriginalExtension(), 'app/public/licenses');
            ProductImage::create(['product_id' => $product->id, 'images' => URL::to('/image').'/'.$filename,'sort_order'=>0]);
        }
        if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $a = \Str::random(5);
            $destinationPath = 'file/'; // upload path
            $nameonly = preg_replace('/\..+$/', '', $image->getClientOriginalName());
            $filename = $nameonly . '_' . $a . '_' . '.' . $image->getClientOriginalExtension();
            $image->move('image', $filename);
            // $path = $image->storeAs('student_files',$nameonly.'_'.$a.'.'.$image->getClientOriginalExtension(), 'app/public/licenses');
            ProductImage::create(['product_id' => $product->id, 'images' => URL::to('/image').'/'.$filename]);
        }
    }

        // $video=$request->file('video');
        // $nameonly=preg_replace('/\..+$/', '', $video->getClientOriginalName());
        // $filename=$nameonly.'_'.$a.'.'.$video->getClientOriginalExtension();
        // $video->move('video',$filename);
        // ProductVideo::create(['product_id'=>$product->id,'video'=>$filename]);

        return redirect()->route('products.index')->with('success', 'Product Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $variationcategories = ProductVariationCategory::where('product_id', $product->id)->get();
        return view('admin.product_variation_category.index', compact('variationcategories', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $categories = ProductCategory::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}
