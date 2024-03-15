<?php

namespace App\Http\Controllers;

use App\Exports\MyExport;
use App\Imports\ExcelImport1;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductInCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Excel;
use Illuminate\Support\Facades\Cache;

class ExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Product::where('category_id',5)->update(['category_id'=>52]);
        // $product=Product::all();
        // foreach($product as $item){
        //     Product::where('id',$item->id)->update(['slug'=>explode('/',$item->url)[1]]);
        // }
        // // $row=Cache::get('row1');
        // // dd($row);

        // // foreach(array_keys($row) as $item){
        // //     echo "1".$item."..". '<br/>';
        // // }
        // return view('admin.customer.show');
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
    //  $this->validate($request, [
    //   'select_file'  => 'required|mimes:xls,xlsx'
    //  ]);
    set_time_limit(0);

     $path = $request->file('excel_file')->getRealPath();

     $data = Excel::import(new ExcelImport1,request()->file('excel_file'));
     Cache::add('notadded', $data->getRowCount());
     dd('Row count: ' . $data->getRowCount());
     $product=Product::all();
        foreach($product as $item){
            Product::where('id',$item->id)->update(['slug'=>explode('/',$item->url)[1]]);
        }
     return redirect()->back();

     return back()->with('success', 'Excel Data Imported successfully.');
    }
    public function import(Request $request)
    {

        dd($request->all());
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);

     $path = $request->file('select_file')->getRealPath();

     $data = Excel::load($path)->get();

     if($data->count() > 0)
     {
      foreach($data->toArray() as $key => $value)
      {
       foreach($value as $row)
       {
        $insert_data[] = array(
         'CustomerName'  => $row['customer_name'],
         'Gender'   => $row['gender'],
         'Address'   => $row['address'],
         'City'    => $row['city'],
         'PostalCode'  => $row['postal_code'],
         'Country'   => $row['country']
        );
       }
      }

      if(!empty($insert_data))
      {
       DB::table('tbl_customer')->insert($insert_data);
      }
     }
     return back()->with('success', 'Excel Data Imported successfully.');
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
}
