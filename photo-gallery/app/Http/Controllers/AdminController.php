<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Category;
use Exception;
use Illuminate\Validation\Rule;
use App\Rules\ValidFilename;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin', [
            'posts' => Post::latest()
                ->filter()
                ->paginate(15)
                ->appends(request()->query()),
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

        request()->validate([
            'photos' => 'required|max:5',
            'photos.*' => ['image', 'max:25000', new ValidFilename],
            'sub_category_id' => 'required'
        ]);

        foreach (request()->file('photos') as $photo) {
            try {
                $post = [];
                $post['title'] = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
                $post['slug'] = str_replace('#', 'no.', str_replace(' ', '-', strtolower($post['title'])));
                $post['photo'] = $photo;
                $post['photo'] = $this->toWebp($post);
                $post['sub_category_id'] = request('sub_category_id');
                Post::create($post);
            } catch(Exception $e) {
                return redirect('/admin')->with('failure', "Failed to add " . pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME) . ".");
            }
        }
        

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
            'sub_category_id' => 'required',
            'rotate' => ''
        ]);

        $attributes['slug'] = str_replace(' ', '-', strtolower($attributes['title']));

        if (isset($attributes['photo'])) {
            $attributes['photo'] = $this->toWebp($attributes);
        }

        if (isset($attributes['rotate'])) {
            if (!isset($attributes['photo'])) {
                $photo = $post->photo; 
            } else {
                $photo = $attributes['photo'];
            }
            $this->rotate(public_path('/photos/').$photo, $attributes['rotate']);
        }
        unset($attributes['rotate']);

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
        $image = \Image::make($attributes['photo'])->encode('webp', 90);
        if ($image->width() > 1080){
            $image->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        $destinationPath = public_path('/photos/');
        $path = $attributes['slug'].time().'.webp';
        $image->save($destinationPath.$path);

        return $path;
    }
    public function rotate($photo, $rotate) 
    {
        $image = \Image::make($photo)->rotate($rotate);
        $image->save($photo);
    }
}
