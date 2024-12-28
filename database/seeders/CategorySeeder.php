<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $main_data = [
            "Аккумуляторные батареи" => "",
            "Зарядные устройства" => "",
            "Преобразователи напряжения" => "",
            "Элементы питания" => "",
            "Аккумуляторные тестеры" => "",
            "Аксессуары" => "",
            "Щетки стеклоочистителя" => "",
        ];

        $sub_main_data = [
            "Провода и клеммы" => 6,
            "Фонари" => 6,
            "Вода дистиллированная" => 6,
            "Электролиты" => 6,
        ];

        $i = 1;
        foreach ($main_data as $key => $item) {

            $cat_elem = [
                "parentid" => 0,
                "order" => $i,
                "name" => $key,
                "slug" => Str::slug($key),
                "description" => $key,
            ];

            DB::table("categories")->insert($cat_elem);
            $i++;


            DB::table("seo_data")->insert(
                [
                    'url' => 'product/cat/'.Str::slug($key),
                    'seo_title' => $key,
                    'seo_description' => $key,
                ]
            );
        }

        $i = 1;
        foreach ($sub_main_data as $key => $item) {

            $cat_elem = [
                "parentid" => $item,
                "order" => $i,
                "name" => $key,
                "slug" => Str::slug($key),
                "description" => $key,
            ];

            DB::table("categories")->insert($cat_elem);
            $i++;


            DB::table("seo_data")->insert(
                [
                    'url' => 'product/cat/'.Str::slug($key),
                    'seo_title' => $key,
                    'seo_description' => $key,
                ]
            );
        }

    }
}
