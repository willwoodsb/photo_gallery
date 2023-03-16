<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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
        return view('create-post');
    }

    public function store()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'photo' => 'required|image'
        ]);

        $attributes['photo'] = request()->file('photo')->store('photos');

        Post::create($attributes);

        return redirect('/');
    }
}
