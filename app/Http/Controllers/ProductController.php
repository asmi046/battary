<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\LoadetData;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return view('wiki.index');
    }

    public function product_cat() {
        return view('product.cat');
    }

    public function product_page($slug) {
        $product = Product::where('slug', $slug)->first();
        if(!$product) abort('404');

        $nal = LoadetData::where('sku', $product->sku)->get();

        return view('product.page', [
            'product' => $product,
            'nal' => $nal,
        ]);
    }
}
