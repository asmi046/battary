<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AkbSize extends Model
{
    public $fillable = [
        'height',
        'width',
        'length',
        'type',
        'order'
    ];
}
