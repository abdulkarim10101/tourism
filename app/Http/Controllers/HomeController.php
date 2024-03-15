<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders=Order::orderBy('created_at','desc')->limit(10)->get();
        $products=Product::orderBy('created_at','desc')->limit(10)->get();
        $orderscount=Order::count();
        $productscount=Product::count();
        $customerscount=User::where('role_id',2)->count();
        $sales=Order::sum('total');

        return view('home',compact('orders','products','orderscount','productscount','customerscount','sales'));
    }
}
