<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public $fillable = [
        'img',
        'title',
        'sub_title',
        'lnk_text',
        'lnk',
        'order'
    ];
}
