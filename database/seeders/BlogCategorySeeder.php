<?php

namespace Database\Seeders;

use DB;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("blog_categories")->insert(
            [
                [
                    'title' => "Производители",
                    'slug' => Str::slug("Производители"),
                    'description' => ""
                ],
                [
                    'title' => "Это интересно",
                    'slug' => Str::slug("Это интересно"),
                    'description' => ""
                ]
            ]
        );


        DB::table("seo_data")->insert(
            [
                [
                    'url' => 'wiki/cat/'.Str::slug("Производители"),
                    'seo_title' => "Полезные материалы по производителям АКБ",
                    'seo_description' => "Полезные материалы по производителям АКБ",
                ],
                [
                    'url' => 'wiki/cat/'.Str::slug("Это интересно"),
                    'seo_title' => "Полезные материалы по АКБ",
                    'seo_description' => "Полезные материалы по АКБ",
                ],
            ]
        );

    }
}
