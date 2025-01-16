<?php

namespace Database\Seeders;

use League\Csv\Reader;
use Illuminate\Database\Seeder;
use App\Imports\SelectionImpoer;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use DB;

class SelectionSeeder extends Seeder
{

    protected function char_replace(string $name) {
        $replace = [
            "?KERMAN-VOLVO" => "AKERMAN-VOLVO",
            "?VERUM AKTIV" => "AVERUM AKTIV",
            "?VR?SEN" => "AVRESEN",
            "Ger?tetr?ger" => "Gerаtetrаger",
            "AUW?RTER" => "AUWARTER",
            "B?HRER" => "BUHRER",
            "BR?YT" => "BRAYT",
            "CITRO?N" => "CITROEN",
            "H?RN?" => "HYRNU",
            "K?LBLE" => "KYLBLE",
            "K?SSBOHRER" => "KASSBOHRER",
            "L?NNEN TEHTAAT" => "LANNEN TEHTAAT",
            "SANTA F?" => "SANTA FE",
            "SC?NIC" => "SCENIC",
            "MEGANE II Coup?" => "MEGANE II Coupe",
            "Mets?koneet" => "Metsakoneet",
            "MURCI?LAGO" => "MURCIELAGO",
            "CEE?D" => "CEED",
            "TAUNUS ?80" => "TAUNUS '80",
            "Ty?koneet" => "Tyokoneet",
        ];

        return isset($replace[$name])?$replace[$name]:$name;
    }

    public function get_power($item) {
        $mod = $item['Модификация'];
        $power = substr($mod, strripos($mod," ("), 1000);

        $t = explode("/", $power);

        if (strripos($mod," ("))
        $power = [
            'model' => substr($mod, 0, strripos($mod," (")),
            'kW' => str_replace(["kW","(", " "], "", $t[0]),
            'PS' => str_replace(["PS",")", " "], "", $t[1]),
        ];
        else
        $power = [
            'model' => $mod,
            'kW' => 0,
            'PS' => 0,
        ];

        return $power;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ini_set("memory_limit", "-1");
        // Excel::import(new SelectionImpoer, public_path('site_data/akb_base.xlsx'));

        $csv = Reader::createFromPath( public_path('site_data/akb_base.csv'), 'r');
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);

        $header = $csv->getHeader();

        $records = $csv->getRecords();

        $index = 0;
        foreach ($records as $item) {

            if (in_array($item['Type'], ["Газонокосилка", "Гидроцикл", "Яхта / Лодка", "Прицеп / Автодом"]) ) continue;

            $pow = $this->get_power($item);

            echo $index." - ".$item['Модель']." ".$item['Бренд']." - ".$item['АКБ']." ".$pow['kW']." / ".$pow['PS']."\n\r";

            DB::table("selections")->insert(
                [
                    'type' => $item['Type'],
                    'brand' => $this->char_replace($item['Бренд']),
                    // 'brand' => $item['Бренд'],
                    'model' => $item['Модель'],

                    // 'modification' => $pow['model'],
                    'modification' => $pow['model'],
                    'kW' => $pow['kW'],
                    'PS' => $pow['PS'],

                    'varta_sku' => $item['АКБ'],
                    'base_down' => $item['Base hold downt'],
                    'volume' => $item['Ёмкость'],
                    'box_size' => $item['РазмерКорпуса'],
                    'amperage' => intval($item['Cca']) / 1.06,
                    'height' => floatval($item['Высота']),
                    'width' => floatval($item['Ширина']),
                    'length' => floatval($item['Длина']),
                    'clem_location' => intval($item['Расположение']),
                    'clem_type' => intval($item['ТипКлемм']),
                    'voltage' => $item['Вольтаж'],
                    'mass' => floatval($item['Вес'])
                ]
            );
            $index++;

        }

    }
}
