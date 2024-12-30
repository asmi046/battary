<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public $fillable = [
        'name',
        'city',
        'obl',
        'time_work',
        'img',
        'adress',
        'geo',
        'phone',
        'email',
        'aproved'
    ];
}
