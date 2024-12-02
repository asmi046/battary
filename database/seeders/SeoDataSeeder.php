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
        ];

        DB::table("seo_data")->insert($data);
    }
}
