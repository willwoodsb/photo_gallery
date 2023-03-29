<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class NotFoundController extends Controller
{
    public function index()
    {
        return view('not-found', [
            'categories' => Category::all()
        ]);
    }
}
