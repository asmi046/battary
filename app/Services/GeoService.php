<?php
namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeoService {


// Белгородская область - 46.172.18.88 - Belgorod Oblast
// Брянская область - 5.77.27.150 - Bryansk Oblast
// Воронежская область - 83.139.167.149 - Voronezh Oblast
// Курская область
// Орловская область -  91.195.137.180 - Oryol oblast
// Смоленская область - 89.179.73.34 - Smolensk Oblast
// Тамбовская область - 37.235.235.142 - Tambov Oblast
// Тульская область - 5.164.31.142 - Tula Oblast

    protected array $response = [
        "city" => "Курск",
        "region" => "Курская область",
        "country" => "Россия",
        "ip_address" => "",
    ];


    protected function result_convert(string $ip = "", object $geo_info) {
        $result = $this->response;

        $result["city"] =  $geo_info->city->name_ru;
        $result["region"] =  $geo_info->region->name_ru;
        $result["country"] =  $geo_info->country->name_ru;
        $result["ip_address"] =  $ip;

        return $result;
    }

    public function get_geo_data(Request $request) {
        $ip = $request->ip();
        $userAgent = $request->userAgent();

        $is_bot = empty($userAgent) || preg_match("~(Google|Yahoo|Rambler|Bot|Yandex|Spider|Snoopy|Crawler|Finder|Mail|curl|request|Guzzle|Java)~i", $userAgent);

        $ip = "5.164.31.142";

        if (!config('geo.adr') || $ip === "127.0.0.1" || $is_bot)
            return $this->response;

        $response = Http::get(config('geo.adr').$ip);

        return $this->result_convert(
                $ip,
                json_decode ($response->body())
            );
    }
}
