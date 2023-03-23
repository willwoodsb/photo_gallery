<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query)
    {
        if (request('search')) {
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhereIn('sub_category_id', SubCategory::where('name', 'like', '%' . request('search') . '%')->get('id'));
        }
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function category()
    {
        return $this->subCategory->belongsTo(Category::class);
    }

}
