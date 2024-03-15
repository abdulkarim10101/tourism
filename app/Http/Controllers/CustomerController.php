<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::where('role_id', 'customer')->get();
        return view('admin.customer.index', compact('customers'));
    }

    public function account_details()
    {
        // dd('h');
        $customer = auth()->user();
        return view('customer.account_details', compact('customer'));
    }

    public function account_information()
    {

        $customer = auth()->user();

        $cities=City::limit(50)->get();

        $states=State::all();
        //  dd($cities);
        return view('customer.account_information', compact('customer','cities','states'));
    }
    public function myorders()
    {
        $customer = auth()->user();
        return view('customer.myorders', compact('customer'));
    }
    public function wishlist()
    {
        $customer = auth()->user();
        return view('customer.wishlist', compact('customer'));
    }
    public function address_book()
    {
        $customer = auth()->user();
        return view('customer.address_book', compact('customer'));
    }

    public function getchangepassword(){
        return view('customer.changepassword');
    }

    public function changepassword(Request $request){

        $user = User::find(auth()->user()->id);
        if (Hash::check($request->old_password, $user->password)) {

            $user->update(['password' => Hash::make($request->password)]);
            return redirect()->back()->with(['message' => 'Action Successful']);

        } else {
            return redirect()->back()->with(['message' => 'Password Mismatch']);
        }

    }

    public function order_detail($id)
    {
        $order_details = OrderDetail::where('order_id', $id)->get();
        return view('customer.order_detail', compact('order_details'));
    }



    public function login(){
        return view('customer.login');
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
        $user = User::find(auth()->user()->id);
        $user->update($request->all());
        return redirect()->back();
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

    public function viewlogin()
    {
        auth()->logout();
        return redirect(route('login'));
    }
}
