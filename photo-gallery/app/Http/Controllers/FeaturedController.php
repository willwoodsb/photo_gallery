<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Featured;
use App\Models\Post;
use App\Models\Category;

class FeaturedController extends Controller
{
    public function index()
    {
        $ids = [];
        foreach (Featured::all('post_id')->toArray() as $post) {
            $ids[] = $post['post_id'];
        }
        $posts = Post::whereIn('id', $ids)->get();
        return view('home', [
            'posts' => $posts,
            'categories' => Category::all()
        ]);
    }
}
