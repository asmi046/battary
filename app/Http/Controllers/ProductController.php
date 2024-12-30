<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\LoadetData;
use Illuminate\Http\Request;
use App\Filters\ProductFilterCatalog;

class ProductController extends Controller
{
    public function search(Request $request) {
        $search_str = $request->input('q');
        $search_result = Product::where('name', 'LIKE', "%".$search_str."%")
        ->orWhere('brand', 'LIKE', "%".$search_str."%")
        ->orWhere('series', 'LIKE', "%".$search_str."%")
        ->paginate(20)
        ->withQueryString();

        return view('product.search',[
            'products' => $search_result,
            'q' => $search_str
        ]);
    }

    public function index(ProductFilterCatalog $request) {
        $all_cat = Category::where('parentid', 0)->get();
        $all_product = Product::select()->filter($request)->paginate(15)->withQueryString();
        return view('product.index', [
            'all_cat' => $all_cat,
            'all_product' => $all_product,
        ]);
    }

    public function product_cat() {
        return view('product.cat');
    }

    public function product_page($slug) {
        $product = Product::where('slug', $slug)->first();
        if(!$product) abort('404');

        $nal = LoadetData::with('shop_data')->where('sku', $product->sku)->where('shop', "!=", "")->orderByRaw("shop") ->get();

        $q_list = [];

        if ($product->clem_location === 1) $q_list = [1, 4];
        if ($product->clem_location === 0) $q_list = [0, 3];

        $upsale = Product::where("width", ">", $product->width-config('select_range.size_minus'))->Where("width", "<", $product->width+config('select_range.size_plus'))
            ->where("height", ">", $product->height-config('select_range.size_minus'))->Where("height", "<", $product->height+config('select_range.size_plus'))
            ->where("length", ">", $product->length-config('select_range.size_minus'))->Where("length", "<", $product->length+config('select_range.size_plus'))
            ->whereIn("clem_location", $q_list)->get();

        return view('product.page', [
            'product' => $product,
            'nal' => $nal,
            'upsale' => $upsale
        ]);
    }
}
