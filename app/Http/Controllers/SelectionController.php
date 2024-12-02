<?php

namespace App\Http\Controllers;

use App\Models\Selection;
use Illuminate\Http\Request;
use App\Filters\SelectorFilter;

class SelectionController extends Controller
{

    public function selection_filter(SelectorFilter $request, string $group = "") {
        if (!empty($group))
            return Selection::select($group)->filter($request)->groupBy($group)->get();
        else
            return Selection::select()->filter($request)->get();
    }

    public function get_ts_types() {
        return Selection::select("type")->groupBy("type")->get();
    }

    public function get_ts_brands(SelectorFilter $request) {
        return Selection::select("brand")->filter($request)->groupBy("brand")->get();
    }

    public function get_ts_models(SelectorFilter $request) {
        return Selection::select("model")->filter($request)->groupBy("model")->get();
    }

    public function select_by_car() {
        return view('select-by-car');
    }

    public function select_by_params() {

    }
}
