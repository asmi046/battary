<?php

namespace App\Console\Commands;

use League\Csv\Reader;
use Illuminate\Console\Command;

use DB;

class LoadData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'battary:load-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Загрузка данных из 1С';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = file_get_contents( public_path('site_data/1c/base.csv') );
        $data = "Артикул~Название~Бренд~Группа АКБ~Емкость~Ток~Габариты~Тип клемм~Вес~Напряжение~Полярность~Производитель~Тип товара~Наличие~Цена~Магазин\n".mb_convert_encoding($data, "utf-8", "windows-1251");

        $csv = Reader::createFromString( $data, 'r');
        $csv->setDelimiter('~');
        $csv->setHeaderOffset(0);

        $header = $csv->getHeader();
        $records = $csv->getRecords();

        $index = 0;

        DB::statement('truncate table loadet_data');

        foreach ($records as $item) {
            print_r($item);
            // if ($index > 3)return;
            DB::table("loadet_data")->insert(
                [
                    'sku' => $item['Артикул'],
                    'title' => $item['Название'],
                    'brand' => $item['Бренд'],
                    'group' => $item['Группа АКБ'],
                    'emkost' => $item['Емкость'],
                    'tok' => $item['Ток'],
                    'gabarits' => $item['Габариты'],
                    'type_clem' => $item['Тип клемм'],
                    'ves' => $item['Вес'],
                    'nap' => $item['Напряжение'],
                    'polarnost' => $item['Полярность'],
                    'producer' => $item['Производитель'],
                    'tovar_type' => $item['Тип товара'],
                    'nal' => intval(str_replace("Вналичии ","", $item['Наличие'])),
                    'price' => floatval(str_replace(["�", " "," "],"", $item['Цена'])),
                    'shop' => $item['Магазин']
                ]
            );

            $index++;
        }
    }
}
