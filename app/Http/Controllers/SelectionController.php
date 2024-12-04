<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Selection;
use Illuminate\Http\Request;
use App\Filters\ProductFilter;
use App\Filters\SelectorFilter;

class SelectionController extends Controller
{

    public function get_akb_size_list() {
        $all_product = Product::all();
        $result = [];
        foreach ($all_product as $item) {
            $key = $item->length." / ".$item->width." / ".$item->height;
            $result[$key] = [
                "text" => $key,
                "length" => $item->length,
                "width" => $item->width,
                "height" => $item->height,
            ];
        }

        return $result;
    }

    public function selection_filter(SelectorFilter $request, string $group = "") {
        if (!empty($group))
            return Selection::select($group)->filter($request)->groupBy($group)->get();
        else
            return Selection::select()->filter($request)->get();
    }

    public function parametr_filter(ProductFilter $request, string $group = "") {
        if (!empty($group))
            return Product::select($group)->filter($request)->groupBy($group)->get();
        else
            return Product::select()->filter($request)->get();
    }

    public function select_product(ProductFilter $request) {
        return Product::select()->filter($request)->get();
    }

    public function select_by_car() {
        return view('select-by-car');
    }

    public function select_by_params() {
        return view('select-by-params');
    }
}
