<?php

namespace Database\Seeders;


use DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = [
            'zar_ustr.json',
            'shetki.json',
            'priobr_napr.json',
            'element_pit.json',
            'aksesuares.json',
            'akb_tester.json',
            'site_akb.json',
        ];

        $categories = [
            "Аккумуляторные батареи" => 1,
            "Зарядные устройства" => 2,
            "Преобразователи напряжения" => 3,
            "Элементы питания" => 4,
            "Аккумуляторные тестеры" => 5,
            "Аксессуары" => 6,
            "Щетки стеклоочистителя" => 7,
            "Провода и клеммы" => 8,
            "Фонари" => 9,
            "Вода дистиллированная" => 10,
            "Электролиты" => 11,
        ];

        foreach ($files as $file) {
            $data = json_decode(file_get_contents( public_path('site_data/'.$file)) );

            $index = 0;
            foreach ($data as $item_l) {

                $item = (array) $item_l;


                if (!isset($item['show'])) continue;
                if ($item['show'] == 0) continue;


                $imgUrl = "";

                if (!empty($item['img'])) {
                    $imgUrl = "products/". Str::slug($item['name'])."_".$index.".jpg";
                    Storage::disk('public')->put($imgUrl, file_get_contents($item['img']), 'public');
                }

                $popular = ($index % 18) == 0;

                echo $item['gabarits']."\n\r";
                $gab = str_to_hvl($item['gabarits']);

                $inserted = [
                    "show" => $item['show'],
                    "name" => $item['name'],
                    "sku" => $item['code1c'],
                    "slug" => Str::slug($item['name']),
                    "brand" => isset($item['sub_cat'])?$item['sub_cat']:null,
                    "series" => isset($item['sub_cat2'])?$item['sub_cat2']:null,
                    "img" => $imgUrl,
                    "price" =>  floatval(str_replace("руб.", "", $item['price'])),
                    'amperage' => $item['amperage'],
                    'height' => $gab['h'],
                    'width' => $gab['w'],
                    'length' => $gab['l'],
                    'volume' => $item['emkost'],
                    'clem_location' => str_to_clem_location($item['polarnost']),
                    'voltage' => floatval($item['voltage']),
                    'popular' => $popular,
                    'type' => isset($item['nazn'])?$item['nazn']:null,
                ];

                print_r($inserted);
                $productId = DB::table("products")->insertGetId($inserted);
                $index++;

                DB::table("seo_data")->insert(
                    [
                        'url' => 'product/'.$inserted['slug'],
                        'seo_title' => $inserted['name'],
                        'seo_description' => $inserted['name'],
                    ]
                );

                DB::table("category_product")->insert(
                    [
                        'category_id' => $categories[$item['cat']],
                        'product_id' => $productId,

                    ]
                );

                if (isset($item['sub_cat']) && isset($categories[$item['sub_cat']])) {
                    DB::table("category_product")->insert(
                        [
                            'category_id' => $categories[$item['sub_cat']],
                            'product_id' => $productId,

                        ]
                    );
                }
            }
        }

    }
}
