<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("menus")->insert(
            [
                [
                    'lnk' => "/about",
                    'order' => 1,
                    'title' => "О нас",
                ],
                [
                    'lnk' => "/catalog",
                    'order' => 2,
                    'title' => "Каталог продкуции",
                ],

                [
                    'lnk' => "/shops",
                    'order' => 3,
                    'title' => "Адреса магазинов",
                ],

                [
                    'lnk' => "/wiki",
                    'order' => 4,
                    'title' => "База знаний",
                ],

                [
                    'lnk' => "/contacts",
                    'order' => 5,
                    'title' => "Контакты",
                ],

            ]);

        DB::table("menus")->insert(
            [
                [
                    'lnk' => "/catalog?type%5B%5D=Аккумуляторы+для+легковых+автомобилей",
                    'order' => 1,
                    'menu' => "Каталог",
                    'title' => "Аккумуляторы для легковых автомобилей",
                ],
                [
                    'lnk' => "/catalog?type%5B%5D=Аккумуляторы+для+мототехники",
                    'order' => 2,
                    'menu' => "Каталог",
                    'title' => "Аккумуляторы для мотоциклов",
                ],

                [
                    'lnk' => "/catalog?type%5B%5D=Аккумуляторы+для+грузовых+автомобилей",
                    'order' => 3,
                    'menu' => "Каталог",
                    'title' => "Аккумуляторы для грузовых автомобилей",
                ],

                [
                    'lnk' => "/catalog?type%5B%5D=Аккумуляторы+для+спецтехники",
                    'order' => 4,
                    'menu' => "Каталог",
                    'title' => "Аккумуляторы для спецтехники",
                ],

            ]);


    }
}
