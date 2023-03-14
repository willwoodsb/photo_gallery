<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

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
    }
}
