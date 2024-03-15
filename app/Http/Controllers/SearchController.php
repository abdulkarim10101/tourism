<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function autocomplete()
    {
        $products = Product::selectRaw('id as id, name as text')->get();
        return response()->json(['results' => $products]);

    }
}
