<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Product extends Model
{
    public $fillable = [
        'show',
        'name',
        'sku',
        'slug',
        'brand',
        'series',
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

    public function category_tovars() {
        return $this->belongsToMany(Category::class);
    }

    public function setSlugAttribute($value)
    {
        if (empty($value))
            $this->attributes['slug'] =  Str::slug($this->name);
        else
            $this->attributes['slug'] =  $value;
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter) {
        return $filter->apply($builder);
    }
}
