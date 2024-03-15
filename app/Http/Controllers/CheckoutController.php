<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\PromoCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Omnipay\Omnipay;
use Session;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(!auth()->check()){
        //     return redirect(route('login'));
        // }
        if (!Session::has('cart')) {
            return redirect(route('shop.index'));
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('frontend.checkout', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
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
        // dd($request->all());
        if (!auth()->check()) {

            $request->validate([
                'method' => 'nullable|in:cash',
                'first_name' => 'nullable|string|max:255',
                'last_name' => 'nullable|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'phone' => 'nullable|string|max:255',
                'city' => 'nullable|string|max:255',
                'postal_code' => 'nullable|string|max:255',
                'state' => 'nullable|string|max:255',
                'password' => 'required|string|min:8',
                'primary_address' => 'nullable|string',
                'order_notes' => 'nullable|string',
                'new_address' => 'nullable|string',
            ]);
        } else {

        }

        if ($request->email != null) {
            $user = User::create($request->all() + ['name' => $request->first_name . ' ' . $request->last_name, 'role_id' => 2]);
            Auth::loginUsingId($user->id);
        }
        if (auth()->user()->primary_address == null) {
            User::where('id', auth()->user()->id)->update(['primary_address' => $request->new_address]);
        }
        // dd($request->all());
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        // dd($request->all());
        if ($request->primary_address != null) {
            $address = $request->primary_address;
        } else {
            $address = auth()->user()->primary_address;
        }

        if ($request->method == 'card') {
            $this->charge($request, $address, $cart);
            return redirect()->route('customer.myorders');
        } else {
            $paid = 0;
            $this->storeOrder($request, $address, $cart, $paid);
            return redirect()->route('customer.myorders');
        }
    }
    public function generateRandomString($length = 7)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }
    public function charge($request, $address, $cart)
    {
        if ($request->input('stripeToken')) {
            $gateway = Omnipay::create('Stripe');
            $gateway->setApiKey(env('STRIPE_SECRET_KEY'));

            $token = $request->input('stripeToken');

            $response = $gateway->purchase([
                'amount' => $cart->totalPrice,
                'currency' => env('STRIPE_CURRENCY'),
                'token' => $token,
            ])->send();

            if ($response->isSuccessful()) {
                // payment was successful: insert transaction data into the database
                $arr_payment_data = $response->getData();

                $isPaymentExist = Payment::where('payment_id', $arr_payment_data['id'])->first();

                if (!$isPaymentExist) {
                    $payment = new Payment;
                    $payment->payment_id = $arr_payment_data['id'];
                    $payment->payer_email = auth()->user()->email;
                    $payment->amount = $arr_payment_data['amount'] / 100;
                    $payment->currency = env('STRIPE_CURRENCY');
                    $payment->payment_status = $arr_payment_data['status'];
                    $payment->save();
                }

                $this->storeOrder($request, $address, $cart, 1);
                return redirect(route('customer.myorders'));
                return "Payment is successful. Your payment id is: " . $arr_payment_data['id'];
            } else {
                // payment failed: display message to customer
                dd($response->getMessage());
            }
        }
    }

    public function storeOrder($request, $address, $cart, $paid)
    {
        $delivery_fee = 0;
        $coupon_code = Session::get('coupon_code');
        $coupon_code1 = PromoCode::where('name', $coupon_code)->first();
        if ($coupon_code1 != null) {
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'delivery_fee' => 200,
                'address' => $address,
                'order_total' => $cart->totalPrice,
                'total' => $cart->totalPrice,
                'status' => 'ordered',
                'extra_comments' => '',
                'method' => $request->method,
                'paid' => $paid,
                'promocode_id' => $coupon_code1->id,
                'discount_percentage' => $coupon_code1->percentage,
                // 'sku'=>$this->generateRandomString()
            ]);
        } else {
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'delivery_fee' => 200,
                'address' => $address,
                'order_total' => $cart->totalPrice,
                'total' => $cart->totalPrice,
                'status' => 'ordered',
                'extra_comments' => '',
                'method' => $request->method,
                'paid' => $paid,
                // 'sku'=>$this->generateRandomString()
            ]);
        }

        $order_total = 0;
        foreach ($cart->items as $item) {
            $a = '';
            if (isset($item['variations'])) {
                foreach ($item['variations'] as $variation) {
                    $a = $a . ',' . $variation;
                }
            }
            $subtotal = $item['price'] * $item['qty'];
            OrderDetail::create([
                'product_id' => $item['product_id'],
                'variation_id' => $a,
                'order_id' => $order->id,
                'qty' => $item['qty'],
                'sub_total' => $item['price'],
            ]);
            $order_total += $item['price'];
        }
        $total = $order_total;
        if ($order->discount_percentage != null) {
            $discount = ($order->discount_percentage / 100) * $order_total;
            $total -= $discount;
        }
        $total += $delivery_fee;
        // dd($total);
        Order::where('id', $order->id)->update(['total' => $total, 'order_total' => $order_total]);

        Session::forget('cart');
        Session::forget('coupon_code');
        Session::forget('coupon_percentage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
