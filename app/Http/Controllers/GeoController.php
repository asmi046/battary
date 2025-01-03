<?php

namespace App\Http\Controllers;

use App\Services\GeoService;
use Illuminate\Http\Request;

class GeoController extends Controller
{
    public function get_geo_data(Request $request, GeoService $geo) {
        $ip = $request->ip();
        $response = $geo->get_geo_data($ip);
        dd("r", $ip, $response);
    }
}
