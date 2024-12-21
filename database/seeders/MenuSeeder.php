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
                    'lnk' => "#",
                    'order' => 1,
                    'title' => "О нас",
                ],
                [
                    'lnk' => "#",
                    'order' => 2,
                    'title' => "Каталог продкуции",
                ],

                [
                    'lnk' => "#",
                    'order' => 3,
                    'title' => "Адреса магазинов",
                ],

                [
                    'lnk' => "#",
                    'order' => 4,
                    'title' => "База знаний",
                ],

                [
                    'lnk' => "#",
                    'order' => 5,
                    'title' => "Контакты",
                ],

            ]);


    }
}
