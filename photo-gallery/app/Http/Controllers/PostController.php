<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('category', [
            'posts' => Post::latest()->paginate(6)
        ]);
    }

}
