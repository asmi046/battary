<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Services\GeoService;
use Illuminate\Http\Request;

class GeoController extends Controller
{
    public function get_geo_data(Request $request, GeoService $geo) {
        return $geo->get_geo_data($request);
    }

    public function get_region_list() {
        $all_shops = Shop::select('obl')->groupBy('obl')->get();

        $alpha_list = [];
        foreach ($all_shops as $item) {
            $alpha_list[ mb_strtoupper (mb_substr($item['obl'], 0, 1))][] = $item['obl'];
        }

        ksort($alpha_list);

        return $alpha_list;
    }
}
