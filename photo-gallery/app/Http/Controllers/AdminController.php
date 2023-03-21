<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\SubCategory;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin', [
            'posts' => Post::latest()->paginate(15),
            'subCategories' => SubCategory::all()
        ]);
    }
}
