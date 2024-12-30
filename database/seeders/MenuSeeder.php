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
                    'lnk' => "#",
                    'order' => 1,
                    'menu' => "Каталог",
                    'title' => "Аккумуляторы для легковых автомобилей",
                ],
                [
                    'lnk' => "#",
                    'order' => 2,
                    'menu' => "Каталог",
                    'title' => "Аккумуляторы для мотоциклов",
                ],

                [
                    'lnk' => "#",
                    'order' => 3,
                    'menu' => "Каталог",
                    'title' => "Аккумуляторы для грузовых автомобилей",
                ],

                [
                    'lnk' => "#",
                    'order' => 4,
                    'menu' => "Каталог",
                    'title' => "Аккумуляторы для спецтехники",
                ],

            ]);


    }
}
