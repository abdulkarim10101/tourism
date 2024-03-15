<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductInCategory;
use Illuminate\Http\Request;
use Symfony\Component\Panther\Client;
use Goutte\Client as Client1;
use Symfony\Component\DomCrawler\Crawler as DomCrawler;

class ScrapperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
        // $client = \Symfony\Component\Panther\Client::createChromeClient();
        // Or, if you care about the open web and prefer to use Firefox
        $client = Client::createFirefoxClient();

        $client->request('GET', $request->link); // Yes, this website is 100% written in JavaScript

        // Wait for an element to be present in the DOM (even if hidden)
        // $crawler = $client->waitFor('.detail-desc-decorate-content');
        $crawler = $client->waitFor('.product-price-value');
        // dd($crawler->html());

        // Alternatively, wait for an element to be visible
        // $crawler = $client->waitForVisibility('#installing-the-framework');
        $images = [];
        $price = $crawler->filter('.product-price-value')->text();
        $title = $crawler->filter('.product-title-text')->text();
        $description = $crawler->filter('.magnifier-image')->attr('src');
        $crawler->filter('.images-view-item > img')->each(function (DomCrawler $node, $i) use (&$images) {
            $images[$i] = trim(str_ireplace('_50x50.png', '', $node->attr('src')));
        });

        $slug = str_ireplace(' ', '-', $title);
        $product = [
            'name' => $title,
            'price' => explode(' ', $price)[1],
            'category_id' => $request->category_id,
            'featured' => $request->featured,
            'slug' => $slug
        ];
        $product = Product::create($product);

        foreach ($images as $item) {
            ProductImage::create([
                'product_id' => $product->id,
                'images' => $item,
            ]);
        }

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
        return redirect()->back();

        // $client1 = new Client1();
        // $crawler = $client->request('GET', 'https://www.aliexpress.com/item/1005003438496824.html');

        // $elements = $crawler->filter('.product-description')->each(function ($node) {
        //     return $node->text();
        // });
        // dd($elements);
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
}
