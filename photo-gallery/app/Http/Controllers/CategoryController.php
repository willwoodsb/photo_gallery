<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $id_array = [];
        foreach ($category->subCategories as $subCat) {
            if (request('sub-cat')) {
                if ($subCat->slug == request('sub-cat')) {
                    $id_array[] = $subCat->id;
                }
            } else {
                $id_array[] = $subCat->id;
            }
        }


        return view('category', [
            'posts' => Post::latest()->whereIn('sub_category_id', $id_array)->paginate(9),
            'category' => $category
        ]);
    }
}
