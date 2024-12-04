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
            [
                'url' => "about",
                'seo_title' => "О нашей сети",
                'seo_description' => "Почему покупатели доверяют сети специализированных аккумуляторных магазинов «Батарейка»",
                'page_title' => "",
            ],
            [
                'url' => "contacts",
                'seo_title' => "Контакты нашей сети",
                'seo_description' => "Контакты нашей сети. Свяжитесь с нами любым удобным для Вас способом.",
                'page_title' => "",
            ],
            [
                'url' => "compare",
                'seo_title' => "Сравнение АКБ",
                'seo_description' => "Сравните АКБ по всем важным характеристикам и примите выбирайте тот который подходит именно Вам",
                'page_title' => "",
            ],
        ];

        DB::table("seo_data")->insert($data);
    }
}
