<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;

class GeoService {

    protected array $response = [
        "city" => "Курск",
        "region" => "Курская область",
        "country" => "Россия",
        "ip_address" => "",
    ];

    protected string $fields = 'city,region,country,ip_address';

    public function get_geo_data(string $id = "127.0.0.1") {

        if (!config('geo.adr') || !$ip || $ip === "127.0.0.1")
            return $this->response;

        $response = Http::get(config('geo.adr'),[
            'api_key' => config('geo.key'),
            'ip_address' => $ip,
            'fields' => $this->$fields
        ]);

        dd($response);
    }
}