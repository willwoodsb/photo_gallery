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
        $coords = [];
        foreach (Featured::all()->toArray() as $post) {
            $ids[] = $post['post_id'];
            $coords[] = [$post['pos-x'], $post['pos-y']];
        }
        $posts = Post::whereIn('id', $ids)->get();
        return view('home', [
            'posts' => $posts,
            'categories' => Category::all(),
            'coordinates' => $coords
        ]);
    }
}
