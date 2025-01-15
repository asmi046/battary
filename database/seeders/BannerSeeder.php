<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storage::disk('public')->put('banners/slide_moto.webp', file_get_contents(public_path('site_data//banners//slide_moto.webp')), 'public');

        DB::table("banners")->insert([
            [
                'img' => 'banners/slide_moto.webp',
                'title' => "Аккумуляторы <br>для мотоциклов",
                'sub_title' => "Компактные и прочные аккумуляторы с высокой стартовой мощностью",
                'lnk_text' => "В каталог",
                'lnk' => "http://127.0.0.1:8001/catalog?type%5B%5D=%D0%90%D0%BA%D0%BA%D1%83%D0%BC%D1%83%D0%BB%D1%8F%D1%82%D0%BE%D1%80%D1%8B+%D0%B4%D0%BB%D1%8F+%D0%BC%D0%BE%D1%82%D0%BE%D1%82%D0%B5%D1%85%D0%BD%D0%B8%D0%BA%D0%B8",
            ],
            [
                'img' => 'banners/slide_moto.webp',
                'title' => "Аккумуляторы <br>для мотоциклов",
                'sub_title' => "Компактные и прочные аккумуляторы с высокой стартовой мощностью",
                'lnk_text' => "В каталог",
                'lnk' => "http://127.0.0.1:8001/catalog?type%5B%5D=%D0%90%D0%BA%D0%BA%D1%83%D0%BC%D1%83%D0%BB%D1%8F%D1%82%D0%BE%D1%80%D1%8B+%D0%B4%D0%BB%D1%8F+%D0%BC%D0%BE%D1%82%D0%BE%D1%82%D0%B5%D1%85%D0%BD%D0%B8%D0%BA%D0%B8",
            ],
            [
                'img' => 'banners/slide_moto.webp',
                'title' => "Аккумуляторы <br>для мотоциклов",
                'sub_title' => "Компактные и прочные аккумуляторы с высокой стартовой мощностью",
                'lnk_text' => "В каталог",
                'lnk' => "http://127.0.0.1:8001/catalog?type%5B%5D=%D0%90%D0%BA%D0%BA%D1%83%D0%BC%D1%83%D0%BB%D1%8F%D1%82%D0%BE%D1%80%D1%8B+%D0%B4%D0%BB%D1%8F+%D0%BC%D0%BE%D1%82%D0%BE%D1%82%D0%B5%D1%85%D0%BD%D0%B8%D0%BA%D0%B8",
            ]
        ]);
    }
}
