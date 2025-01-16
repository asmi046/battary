<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarIcon extends Model
{
    public $fillable = [
        'img',
        'title',
        'order'
    ];
}
