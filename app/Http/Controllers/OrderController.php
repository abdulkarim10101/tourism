<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\ProductVariationCategory;
use Illuminate\Http\Request;

class OrderController extends Controller
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
    public function index(Request $request)
    {
        $orders = Order::paginate(25);
        if (!$request->keyword) {
            $orders = Order::orderBy('created_at', 'desc')->paginate(25);
        } else {
            $search = $request->keyword;
            $orders = Order::where('id', '!=', null)->orderBy('created_at', 'desc');

            $orders->WhereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->orWhere('status', 'like', '%' . $search . '%')
            ->orWhere('id', 'like', '%' . $search . '%');

            $orders = $orders->paginate(25)->setPath('');

            $pagination = $orders->appends(array(
                'keyword' => $request->keyword
            ));
        }

        $order_statuses = OrderStatus::all();
        return view('admin.order.index', compact('orders', 'order_statuses'));
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $orders = OrderDetail::where('order_id', $order->id)
            ->leftJoin('product_variation_categories', 'product_variation_categories.product_id', 'order_details.product_id')
            ->leftJoin('products', 'order_details.product_id', 'products.id')
            ->select('order_details.*', 'products.name')
            ->get();
        $variations = ProductVariation::all();
        if (auth()->user()->role_id == 'customer') {
            return view('customer.order.show', compact('orders', 'variations'));
        }
        return view('admin.order.show', compact('orders', 'variations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    public function showvariations($id)
    {
        $order = OrderDetail::where('id', $id)->first();
        $order_variations = explode(',', $order->variation_id);
        $product = Product::where('id', $order->product_id)->first()->name;
        $variationcat = ProductVariationCategory::where('product_id', $order->product_id)->first();
        $variations = $variationcat->variations;
        if (auth()->user()->role_id == 'customer') {
            return view('customer.order.showvariations', compact('order_variations', 'variations', 'product'));
        }
        return view('admin.order.showvariations', compact('order_variations', 'variations', 'product'));
    }

    public function customerorders($id)
    {
        $orders = Order::where('user_id', $id)->paginate(25);
        $order_statuses = OrderStatus::all();
        return view('admin.order.index', compact('orders', 'order_statuses'));
    }

    public function changeorderstatus(Request $request)
    {
        $order = Order::find($request->id);
        $order->update($request->all());
    }
}
