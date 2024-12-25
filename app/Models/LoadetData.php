<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoadetData extends Model
{
    public $fillable = [
        'sku',
        'title',
        'brand',
        'group',
        'emkost',
        'tok',
        'gabarits',
        'type_clem',
        'ves',
        'nap',
        'polarnost',
        'producer',
        'tovar_type',
        'nal',
        'price',
        'shop'
    ];

    public function shop_data() {
        return $this->hasOne(Shop::class, "name", "shop");
    }
}
