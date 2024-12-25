<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

use Orchid\Screen\AsSource;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "parentid",
        "order",
        "name",
        "slug",
        'description',
        'title_seo',
        'description_seo'
    ];

    public function category_tovars() {
        return $this->belongsToMany(ProductGroup::class);
    }


    public function setSlugAttribute($value)
    {
        if (empty($value))
            $this->attributes['slug'] =  Str::slug($this->name);
        else
            $this->attributes['slug'] =  $value;
    }
}
