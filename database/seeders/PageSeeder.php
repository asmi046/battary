<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Storage::disk('public')->put('pages/assortiment.jpg', file_get_contents(public_path('site_data//about_img//assortiment.jpg')), 'public');
        Storage::disk('public')->put('pages/shop.jpg', file_get_contents(public_path('site_data//about_img//shop.jpg')), 'public');

        $data = [
            [
                'title' => 'Политика конфиденциальности',
                'slug' => Str::slug("Политика конфиденциальности"),
                'description' => file_get_contents(public_path('page_text//policy.html')),
            ],

            [
                'title' => 'О нас',
                'slug' => Str::slug("О нас"),
                'description' => file_get_contents(public_path('page_text//about.html')),

                'galery' => json_encode([
                    [
                        'title' => 'Центральный магазин',
                        'img' => 'pages/shop.jpg',
                    ],
                    [
                        'title' => 'Ассортимент продукции',
                        'img' => 'pages/assortiment.jpg',
                    ],
                ]),

                'params' => json_encode([
                    [
                        'cat' => "Цифры",
                        'title' => 'Лет на рынке',
                        'value' => '15 +',
                    ],
                    [
                        'cat' => "Цифры",
                        'title' => 'Магазинов',
                        'value' => '20 +',
                    ],
                    [
                        'cat' => "Цифры",
                        'title' => 'Брендов АКБ',
                        'value' => '12 +',
                    ],

                    [
                        'cat' => "adv",
                        'title' => 'Широкий ассортимент и наличие',
                        'value' => 'adv_assortiment',
                    ],

                    [
                        'cat' => "adv",
                        'title' => 'Гарантия качества',
                        'value' => 'adv_garant',
                    ],

                    [
                        'cat' => "adv",
                        'title' => 'Выгоднфе цены',
                        'value' => 'adv_price',
                    ],

                    [
                        'cat' => "adv",
                        'title' => 'Ориентированность на клиента',
                        'value' => 'adv_client',
                    ],

                    [
                        'cat' => "adv",
                        'title' => 'Актуальная продукция',
                        'value' => 'adv_actual',
                    ],

                    [
                        'cat' => "adv",
                        'title' => 'Профессиональные консультации',
                        'value' => 'adv_consult',
                    ],

                ]),


            ],
        ];



        foreach ($data as $item) {
            // Storage::disk('public')->put("main_bnr.webp", file_get_contents(public_path('img/main_bnr.webp')), 'public');
            DB::table("pages")->insert($item);

            DB::table("seo_data")->insert(
                [
                    'url' => 'page/'.$item['slug'],
                    'seo_title' => $item['title'],
                    'seo_description' => $item['title'],
                ]
            );
        }



    }
}
