<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('subcategory-index', [
            'subCategories' => SubCategory::latest()->filter()->paginate(15),
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        return view('create-subcategory', [
            'categories' => Category::all(),
        ]);
    }

    public function store()
    {

        $attributes = request()->validate([
            'name' => ['required', Rule::unique('sub_categories', 'name')],
            'category_id' => 'required'
        ]);

        $attributes['slug'] = str_replace(' ', '-', strtolower($attributes['name']));
        

        SubCategory::create($attributes);

        return redirect('/admin/subcategories');
    }

    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        Post::where('sub_category_id', $subCategory->id)->delete();
        

        return redirect('/admin/subcategories')->with('success', 'Sub category deleted.');
    }

    public function edit(SubCategory $subCategory)
    {
        return view('edit-subcategory', [
            'subCategory' => $subCategory,
            'categories' => Category::all()
        ]);
    }
    public function update(SubCategory $subCategory)
    {
        $attributes = request()->validate([
            'name' => ['required', Rule::unique('sub_categories', 'name')->ignore($subCategory->id)],
            'category_id' => 'required'
        ]);

        $attributes['slug'] = str_replace(' ', '-', strtolower($attributes['name']));

        

        $subCategory->update($attributes);

        return redirect('/admin')->with('success', 'Sub category updated.');
    }
}
