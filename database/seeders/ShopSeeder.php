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
                    'name' => 'Курск "Батарейка" Моковская',
                    'city' => "Курск",
                    'adress' => "ул. Моковская, 17",
                    'geo' => "51.70980027557951,36.1507363544921",
                    'phone' => "+7 (4712) 35-44-25",
                    'aproved' => true
                ],

                [
                    'name' => 'Курск "Батарейка" 50летОктября',
                    'city' => "Курск",
                    'adress' => "ул. 50 лет Октября, 126",
                    'geo' => "51.76258115370133,36.130402771827704",
                    'phone' => "+7 (4712) 52-55-95",
                    'aproved' => true
                ],

                [
                    'name' => 'Курск "Батарейка" Стрела',
                    'city' => "Курск",
                    'adress' => "ул. Радищева, 118, магазин «Стрела»",
                    'geo' => "51.76258115370133,36.130402771827704",
                    'phone' => "+7 (4712) 53-45-45",
                    'aproved' => true
                ],

                [
                    'name' => 'Железногорск "Батарейка"',
                    'city' => "Курск",
                    'adress' => "ул. Радищева, 118, магазин «Стрела»",
                    'geo' => "51.76258115370133,36.130402771827704",
                    'phone' => "+7 (4712) 53-45-45",
                    'aproved' => true
                ],

                [
                    'name' => 'Курск "Батарейка" Малых',
                    'city' => "Курск",
                    'adress' => "Курск, Малых, 33",
                    'geo' => "51.76258115370133,36.130402771827704",
                    'phone' => "+7 (4712) 50-31-04",
                    'aproved' => true
                ],
            ]
        );
    }
}
