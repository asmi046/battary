<?php

namespace Database\Seeders;


use DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = json_decode(file_get_contents( public_path('site_data/site_akb.json')) );

        $index = 0;
        foreach ($data as $item_l) {

            $item = (array) $item_l;
            $imgUrl = "";

            if (!empty($item['img'])) {
                $imgUrl = "products/". Str::slug($item['name'])."_".$index.".jpg";
                Storage::disk('public')->put($imgUrl, file_get_contents($item['img']), 'public');
            }


            echo $item['gabarits']."\n\r";
            $gab = str_to_hvl($item['gabarits']);

            $inserted = [
                "name" => $item['name'],
                "slug" => Str::slug($item['name']),
                "img" => $imgUrl,
                "price" =>  floatval(str_replace("руб.", "", $item['price'])),
                'amperage' => $item['amperage'],
                'height' => $gab['h'],
                'width' => $gab['w'],
                'length' => $gab['l'],
                'volume' => $item['emkost'],
                'clem_location' => str_to_clem_location($item['polarnost']),
                'voltage' => $item['voltage'],
                'type' => $item['nazn'],
            ];

            print_r($inserted);
            DB::table("products")->insert($inserted);
            $index++;
        }
    }
}
