<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
