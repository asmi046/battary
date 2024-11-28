<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public $fillable = [
        'name',
        'city',
        'adress',
        'geo',
        'phone',
        'email',
        'aproved'
    ];
}
