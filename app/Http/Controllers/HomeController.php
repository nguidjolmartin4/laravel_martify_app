<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;

class HomeController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with('products')->take(4)->get();
        $categories = Category::take(6)->get();

        return view('home', compact('categories', 'subcategories'));
    }

    public function sell()
    {
        $posts = Post::latest()->take(3)->get();

        return view('sell', ['posts' => $posts]);
    }
}
