<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class SubCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query)
    {
        if (request('search')) {
            $query
                ->where('name', 'like', '%' . request('search') . '%')
                ->orWhereIn('category_id', Category::where('name', 'like', '%' . request('search') . '%')->get('id'));
        }
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
