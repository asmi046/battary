<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\AkbSize;
use App\Models\CarIcon;
use App\Models\Selection;

class MainSelectorController extends Controller
{
    public function get_all_car_icon() {
        $all_car_icons = CarIcon::select()->orderBy('order')->get();
        return $all_car_icons;
    }

    public function get_all_akb_size() {
        $all_akb_size = AkbSize::select()->orderBy('order')->get();
        return $all_akb_size;
    }

    public function get_marka_by_char($char) {
        $all_marka = Selection::select('brand')->where('type', "Легковой автомобиль")->where("brand", "LIKE", mb_strtoupper($char)."%")->groupBy('brand')->get();
        return $all_marka;
    }
}
