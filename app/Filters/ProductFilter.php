<?php

namespace App\Filters;

class ProductFilter extends QueryFilter {

    public function volume($volume) {
        if  (!empty($volume))
            $this->builder->where("volume", ">", $volume-5)->Where("volume", "<", $volume+5);
    }

    public function clem_location($clem_location) {
        if  (!empty($clem_location) )
            $this->builder->where("clem_location", $clem_location);
    }

    public function width($width) {
        if  (!empty($width))
            $this->builder->where("width", ">", $width-5)->Where("volume", "<", $width+5);
    }

    public function height($height) {
        if  (!empty($height))
            $this->builder->where("height", ">", $height-5)->Where("height", "<", $height+5);
    }

    public function length($length) {
        if  (!empty($length))
            $this->builder->where("length", ">", $length-5)->Where("length", "<", $length+5);
    }

}
