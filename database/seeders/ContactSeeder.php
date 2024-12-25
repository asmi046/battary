<?php

namespace Database\Seeders;

use DB;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
                'value' => "+7 (4712) 35-46-18",
            ],

            [
                'name' => "E-mail",
                'key' => "email",
                'value' => "tm-2000@yandex.ru",
            ],

            [
                'name' => "Адрес",
                'key' => "adress",
                'value' => "305007, г. Курск, ул. Моковская, 17",
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

            [
                'name' => "ОГРН",
                'key' => Str::slug("ОГРН"),
                'value' => "1024600946149",
            ],

            [
                'name' => "ИНН",
                'key' => Str::slug("ИНН"),
                'value' => "4630027182",
            ],

            [
                'name' => "ОКПО",
                'key' => Str::slug("ОКПО"),
                'value' => "53314187",
            ],

            [
                'name' => "р/с",
                'key' => Str::slug("р/с"),
                'value' => "40702810105310001834",
            ],

            [
                'name' => "Банк",
                'key' => Str::slug("Банк"),
                'value' => "Филиале «Центральный» ПАО БАНК 'ФК ОТКРЫТИЕ', г. Москва",
            ],

            [
                'name' => "БИК",
                'key' => Str::slug("БИК"),
                'value' => "044525297",
            ],

            [
                'name' => "к/с",
                'key' => Str::slug("к/с"),
                'value' => "30101810945250000297",
            ],

            [
                'name' => "Генеральный директор",
                'key' => Str::slug("Генеральный директор"),
                'value' => "Ягерь Евгения Сергеевна, действует на основании Устава",
            ],

            [
                'name' => "Главный бухгалтер",
                'key' => Str::slug("Главный бухгалтер"),
                'value' => "Балашова Ольга Ивановна",
            ],

        ];

        DB::table("contacts")->insert($data);
    }
}
