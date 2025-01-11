<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        return view('shops');
    }

    public function get_shops(Request $request) {
        $obl = $request->input('obl') ?? "%";
        $apr = $request->input('apr') ?? "%";
        $all_shop = Shop::where('obl', 'LIKE', $obl)
            ->where('aproved',  'LIKE', $apr)
            ->get();
        return $all_shop;
    }
}
