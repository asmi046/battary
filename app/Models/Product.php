<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = [
        'name',
        'slug',
        'img',
        'price',
        'amperage',
        'height',
        'width',
        'length',
        'volume',
        'clem_location',
        'voltage',
        'type',
        'galery'
    ];

    public $casts = [
        'galery' => "Array"
    ];
}
