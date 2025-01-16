<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

use DB;


class CarIconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "Audi" => "audi.png",
            "BMW" => "bmw.png",
            "Hyundai" => "hyundai.png",
            "Ford" => "ford.png",
            "Lada" => "lada.png",
            "KIA" => "kia.png",
            "Toyota" => "toyota.png",
            "Mitsubishi" => "mitsubishi.png",
            "Volkswagen" => "volkswagen.png",
            "Daewoo" => "daewoo.png",
        ];

        $i = 1;
        foreach ($data as $key => $item) {
            Storage::disk('public')->put('car_icon/'.$item, file_get_contents(public_path('site_data//car_icon//'.$item)), 'public');

            DB::table("car_icons")->insert(
                [
                    'img' => 'car_icon/'.$item,
                    'title' => $key
                ]
            );
            $i++;
        }
    }
}
