<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        return view('category', [
            'posts' => Post::latest()->paginate(6)
        ]);
    }

    public function create()
    {
        return view('create-post', [
            'subCategories' => SubCategory::all(),
            'categories' => Category::all(),
        ]);
    }

    public function store()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'photo' => 'required|image',
            'sub_category_id' => 'required'
        ]);

        $imageName = time() . '.' . $attributes['photo']->extension();
        $attributes['photo']->move(public_path('photos'), $imageName);
        $attributes['photo'] = $imageName;

        Post::create($attributes);

        return redirect('/');
    }
}
