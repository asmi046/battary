<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    public $fillable = [
        'title',
        'slug',
        'description',
    ];

    public function posts() {
        return $this->belongsToMany(Blog::class);
    }


    public function setSlugAttribute($value)
    {
        if (empty($value))
            $this->attributes['slug'] =  Str::slug($this->title);
        else
            $this->attributes['slug'] =  $value;
    }
}
