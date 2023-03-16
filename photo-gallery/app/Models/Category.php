<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query)
    {
        if (request('sub-cat')) {
            $query
                ->where('sub_category_id', request('sub-cat'));
        }
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function posts()
    {
        return $this->hasManyThrough(Post::class, SubCategory::class);
    }
}
