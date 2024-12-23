<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => "Организация",
                'key' => "organ",
                'value' => "",
            ],

            [
                'name' => "Телефон",
                'key' => "phone",
                'value' => "+7 (4712) 35-44-25",
            ],

            [
                'name' => "Телефон (дополнительный)",
                'key' => "phone2",
                'value' => "+7 (4712) 35-44-25",
            ],

            [
                'name' => "E-mail",
                'key' => "email",
                'value' => "",
            ],

            [
                'name' => "Адрес",
                'key' => "adress",
                'value' => "г. Курск, ул. Моковская, 17",
            ],

            [
                'name' => "Координаты",
                'key' => "geo",
                'value' => "",
            ],

            [
                'name' => "Ссылка на VK",
                'key' => "vk",
                'value' => "#",
            ],

            [
                'name' => "Ссылка на Telegram",
                'key' => "tg",
                'value' => "#",
            ],

            [
                'name' => "Ссылка на WhatsApp",
                'key' => "ws",
                'value' => "#",
            ],

        ];

        DB::table("contacts")->insert($data);
    }
}
