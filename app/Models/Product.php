<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Product extends Model
{
    public $fillable = [
        'name',
        'slug',
        'img',
        'old_price',
        'price',
        'amperage',
        'height',
        'width',
        'length',
        'volume',
        'clem_location',
        'voltage',
        'popular',
        'type',
        'galery'
    ];

    public $casts = [
        'galery' => "Array"
    ];


    public function scopeFilter(Builder $builder, QueryFilter $filter) {
        return $filter->apply($builder);
    }
}
