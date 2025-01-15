<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Selection;
use Illuminate\Http\Request;
use App\Filters\ProductFilter;
use App\Filters\SelectorFilter;
use App\Services\OrderServices;

class SelectionController extends Controller
{

    public function get_akb_size_list() {
        $all_product = Product::all();
        $result = [];

        $result["%"] = [
            "text" => "%",
            "length" => "%",
            "width" => "%",
            "height" => "%",
        ];
        foreach ($all_product as $item) {
            if ($item->length == 0)
                continue;
            $key = $item->length." / ".$item->width." / ".$item->height;
            $result[$key] = [
                "text" => $key,
                "length" => $item->length,
                "width" => $item->width,
                "height" => $item->height,
            ];
        }

        uasort($result, function ($a, $b) {
            // dd($a['length'], $b['length']);

            return ($a['length'] <= $b['length'])?-1:1;

        });

        return $result;
    }

    public function selection_filter(SelectorFilter $request, OrderServices $order, string $group = "") {
        $resuilt = [];
        if (!empty($group))
            $resuilt = Selection::select($group)->filter($request)->groupBy($group)->get();
        else
            $resuilt = Selection::select()->filter($request)->get();

        if ($group === 'type') return $order->sort_type_ts($resuilt);

        return $resuilt;
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
