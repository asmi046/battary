<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Selection;
use Illuminate\Http\Request;
use App\Filters\ProductFilter;
use App\Filters\SelectorFilter;

class SelectionController extends Controller
{

    public function selection_filter(SelectorFilter $request, string $group = "") {
        if (!empty($group))
            return Selection::select($group)->filter($request)->groupBy($group)->get();
        else
            return Selection::select()->filter($request)->get();
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
