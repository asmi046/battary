<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

use DB;

class AkbSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            '195/130/168' => [
                'length' => 195,
                'width' => 130,
                'height' => 168,
            ],

            '198/166/170' => [
                'length' => 198,
                'width' => 166,
                'height' => 170,
            ],

            '205/71/162' => [
                'length' => 205,
                'width' => 71,
                'height' => 162,
            ],

            '205/87/162' => [
                'length' => 205,
                'width' => 87,
                'height' => 162,
            ],

            '205/90/159' => [
                'length' => 205,
                'width' => 90,
                'height' => 159,
            ],

            '206/172/184' => [
                'length' => 206,
                'width' => 172,
                'height' => 184,
            ],

            '207/175/175' => [
                'length' => 207,
                'width' => 175,
                'height' => 175,
            ],

            '207/175/190' => [
                'length' => 207,
                'width' => 175,
                'height' => 190,
            ],

            '208/171/197' => [
                'length' => 208,
                'width' => 171,
                'height' => 197,
            ],

            '230/172/225' => [
                'length' => 230,
                'width' => 172,
                'height' => 225,
            ],
        ];

        $i = 1;
        foreach ($data as $key => $item) {

            DB::table("akb_sizes")->insert(
                $item
            );
            $i++;
        }



    }
}
