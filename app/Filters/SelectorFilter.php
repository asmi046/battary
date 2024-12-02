<?php

namespace App\Filters;

class SelectorFilter extends QueryFilter {

    public function type($type) {
        if  (!empty($type))
            $this->builder->where("type", $type);
    }

    public function brand($brand) {
        if  (!empty($brand))
            $this->builder->where("brand", $brand);
    }

    public function model($model) {
        if  (!empty($model))
            $this->builder->where("model", $model);
    }

    // public function order($order) {
    //         if ($order == "Сначала дешевые") $this->builder->orderBy('price', 'asc');
    //         if ($order == "Сначала дорогие") $this->builder->orderBy('price', 'desc');
    //         if ($order == "В алфавитном порядке") $this->builder->orderBy('title', 'asc');
    // }



    // public function ve($ve) {
    //         if ($ve != "%") $this->builder->whereHas('effects',
    //         function ($query) {
    //             $query->whereIn('name', $this->request->input('ve'));
    //         });
    // }

    // public function subcat($subcat) {
    //     if (!empty($subcat)) $this->builder->whereIn("sub_category", $subcat);
    // }

    // public function osobennosti($osobennosti) {

    //     foreach ($osobennosti as $osb)
    //     {
    //         if ($osb == "Скидка") $this->builder->where("old_price", 0);
    //         if ($osb == "Хит продаж") $this->builder->where("hit", 1);
    //         if ($osb == "Новинки") $this->builder->where("new", 1);
    //     }

    // }
}
