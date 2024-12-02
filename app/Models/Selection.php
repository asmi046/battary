<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Selection extends Model
{
    public $fillable = [
        'type',
        'brand',
        'model',
        'modification',
        'kW',
        'PS',
        'varta_sku',
        'base_down',
        'volume',
        'box_size',
        'amperage',
        'height',
        'width',
        'length',
        'clem_location',
        'clem_type',
        'voltage',
        'mass'
    ];

    public function scopeFilter(Builder $builder, QueryFilter $filter) {
        return $filter->apply($builder);
    }
}
