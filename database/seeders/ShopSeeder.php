<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("shops")->insert(
            [
                [
                    'name' => '"Батарейка" Моковская',
                    'city' => "Курск",
                    'adress' => "ул. Моковская, 17",
                    'geo' => "51.70980027557951,36.1507363544921",
                    'phone' => "+7 (4712) 35-44-25",
                    'aproved' => true
                ],

                [
                    'name' => '"Батарейка" 50лет Октября',
                    'city' => "Курск",
                    'adress' => "ул. 50 лет Октября, 126",
                    'geo' => "51.76258115370133,36.130402771827704",
                    'phone' => "+7 (4712) 52-55-95",
                    'aproved' => true
                ],
            ]
        );
    }
}
