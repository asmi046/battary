<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function get_all_banners() {
        $all_banners = Banner::all();
        return $all_banners;
    }
}
