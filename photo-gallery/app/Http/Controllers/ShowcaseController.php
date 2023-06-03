<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Showcase;
use Illuminate\Validation\Rule;

class ShowCaseController extends Controller
{
    public function index() {
        return view('showcase', [
            'categories' => Category::all(),
            'showcases' => Showcase::all(),
        ]);
    }
    public function admin() {
        return view('showcase-dashboard', [
            'showcases' => Showcase::all(),
        ]);
    }
    public function create()
    {
        return view('create-showcase');
    }
    public function store()
    {
        request()->validate([
            'photos' => 'required',
            'photos.*' => 'image',
        ]);
        foreach (request()->file('photos') as $photo) {
            $post = [];
            $post['title'] = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $post['slug'] = str_replace('#', 'no.', str_replace(' ', '-', strtolower($post['title'])));
            $post['photo'] = $photo;
            $post['photo'] = $this->toWebp($post);
            Showcase::create($post);
        }
        

        return redirect('/admin');
    }

    public function toWebp($attributes) 
    {
        $image = \Image::make($attributes['photo'])->encode('webp', 90);
        if ($image->width() > 1080){
            $image->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        $destinationPath = public_path('/showcase/');
        $path = $attributes['slug'].time().'.webp';
        $image->save($destinationPath.$path);

        return $path;
    }
}
