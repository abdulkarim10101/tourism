<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function autocomplete()
    {
        $products = Product::select('name')->get()->map(function ($product) {
            return [
                'id' => $product->name,
                'text' => $product->name
            ];
        });
        // dd($products);
        return response()->json(['results' => $products]);

    }
}
