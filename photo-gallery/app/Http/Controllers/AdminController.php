<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin', [
            'posts' => Post::latest()->filter()->paginate(15),
            'subCategories' => SubCategory::all()
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
            'title' => ['required', Rule::unique('posts', 'title')],
            'photo' => 'required|image|max:10240',
            'sub_category_id' => 'required'
        ]);

        $attributes['slug'] = str_replace(' ', '-', strtolower($attributes['title']));

        $attributes['photo'] = $this->toWebp($attributes);
        

        Post::create($attributes);

        return redirect('/admin');
    }

    public function edit(Post $post)
    {
        return view('edit-post', [
            'post' => $post,
            'categories' => Category::all(),
            'subCategories' => SubCategory::all()
        ]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => ['required', Rule::unique('posts', 'title')->ignore($post->id)],
            'photo' => 'image',
            'sub_category_id' => 'required'
        ]);

        $attributes['slug'] = str_replace(' ', '-', strtolower($attributes['title']));

        if (isset($attributes['photo'])) {
            $attributes['photo'] = $this->toWebp($attributes);
        }

        

        $post->update($attributes);

        return redirect('/admin')->with('success', 'Post updated.');
    }

    public function destroy(Post $post)
    {
        if (substr($post->photo, 0, 5) != 'https') {
            unlink(public_path('/photos/').$post->photo);
        }
        
        $post->delete();

        return redirect('/admin')->with('success', 'Post deleted.');
    }

    public function toWebp($attributes) 
    {
        $imageResize = \Image::make($attributes['photo'])->encode('webp', 90);
        $destinationPath = public_path('/photos/');
        $path = $attributes['slug'].time().'.webp';
        $imageResize->save($destinationPath.$path);

        return $path;
    }
}
