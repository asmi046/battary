<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class SeoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'url' => "/",
                'seo_title' => "Сеть специализированных магазинов «Батарейка»",
                'seo_description' => "Сеть специализированных аккумуляторных магазинов «Батарейка»",
                'page_title' => "",
            ],

            [
                'url' => "select_by_car",
                'seo_title' => "Подбор АКБ по марке и модели автомобиля",
                'seo_description' => "Подбор АКБ по марке и модели автомобиля",
                'page_title' => "",
            ],

            [
                'url' => "select_by_params",
                'seo_title' => "Подбор АКБ по параметрам",
                'seo_description' => "Подбор АКБ по  параметрам",
                'page_title' => "",
            ],
        ];

        DB::table("seo_data")->insert($data);
    }
}
