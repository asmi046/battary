<?php

namespace Database\Seeders;

use DB;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storage::disk('public')->put('blog/taz.webp', file_get_contents( public_path('site_data/blog/taz.webp') ), 'public');
        Storage::disk('public')->put('blog/vtor.webp', file_get_contents( public_path('site_data/blog/vtors.webp') ), 'public');

        $elem_id = DB::table("blogs")->insertGetId(
            [
                'title' => "Тюменский Аккумуляторный Завод",
                'slug' => Str::slug("Тюменский Аккумуляторный Завод"),
                'img' => 'blog/taz.webp',
                'description' => file_get_contents(public_path('site_data/blog/taz.html'))
            ]
        );

        DB::table("blog_blog_category")->insertGetId(
            [
                'blog_id' => $elem_id,
                'blog_category_id' => 1,
            ]
        );

        DB::table("seo_data")->insert(
                [
                    'url' => 'wiki/'.Str::slug("Тюменский Аккумуляторный Завод"),
                    'seo_title' => "Тюменский Аккумуляторный Завод",
                    'seo_description' => "Тюменский Аккумуляторный Завод",
                ],
        );


        $elem_id = DB::table("blogs")->insertGetId(
            [
                'title' => "Использование вторсырья при производстве аккумуляторов",
                'slug' => Str::slug("Использование вторсырья при производстве аккумуляторов"),
                'img' => 'blog/vtor.webp',
                'description' => file_get_contents(public_path('site_data/blog/vtors.html'))
            ]
        );

        DB::table("blog_blog_category")->insertGetId(
            [
                'blog_id' => $elem_id,
                'blog_category_id' => 2,
            ]
        );

        DB::table("seo_data")->insert(
            [
                'url' => 'wiki/'.Str::slug("Использование вторсырья при производстве аккумуляторов"),
                'seo_title' => "Использование вторсырья при производстве аккумуляторов",
                'seo_description' => "Использование вторсырья при производстве аккумуляторов",
            ],
        );
    }
}
