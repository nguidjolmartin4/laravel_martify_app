<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        // Mail::to('nguidjolmartin@gmail.com')->send(new WelcomeMail((Auth::user())));

        $posts = Post::latest()->take(3)->get();

        $subcategories = Subcategory::with('products')->take(4)->get();
        $categories = Category::take(6)->get();

        return view('home', compact('categories', 'subcategories', 'posts'));
    }
}
