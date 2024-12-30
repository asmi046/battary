<?php

namespace App\Filters;

use Illuminate\Contracts\Database\Eloquent\Builder;

class ProductFilterCatalog extends QueryFilter {

    public function category($category) {
        if  (!empty($category))
            $this->builder->whereHas('category_tovars', function (Builder $query) use ($category) {
                $query->whereIn('categories.id', $category);
            });
    }

    public function price_from($price_from) {
        if  (!empty($price_from))
            $this->builder->where("price", ">=", $price_from);
    }

    public function price_to($price_to) {
        if  (!empty($price_to))
            $this->builder->where("price", "<", $price_to);
    }

    public function volume_from($volume_from) {
        if  (!empty($volume_from))
            $this->builder->where("volume", ">=", $volume_from);
    }

    public function volume_to($volume_to) {
        if  (!empty($volume_to))
            $this->builder->where("volume", "<", $volume_to);
    }

    public function amperage_from($amperage_from) {
        if  (!empty($amperage_from))
            $this->builder->where("amperage", ">=", $amperage_from);
    }

    public function amperage_to($amperage_to) {
        if  (!empty($amperage_to))
            $this->builder->where("amperage", "<", $amperage_to);
    }

    public function clem_location($clem_location) {
        if  ( empty($clem_location) ) return;
        if  ( $clem_location === "%" ) return;

        $q_list = [];

        if ($clem_location === "Прямая") $q_list = [1, 4];
        if ($clem_location === "Обратная") $q_list = [0, 3];

        $this->builder->whereIn("clem_location", $q_list);
    }


}
