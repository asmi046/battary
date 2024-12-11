<?php
namespace App\Services;


class OrderServices {
    protected $ts_type_order = null;

    public function __construct()
    {
        $this->ts_type_order = config('orders.type_ts');
    }

    public function sort_type_ts( $data ) {
        $result = [];

        $no_in_list = [];
        foreach ($data as $item) {
            if (!in_array($item->type, $this->ts_type_order) )
                $no_in_list[] = $item;
        }

        foreach ($this->ts_type_order as $item) {
            $obj = new \stdClass();
            $obj->type = $item;
            $result[] = $obj;
        }

        return array_merge($result, $no_in_list);
    }

}
