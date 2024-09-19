<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $electronics = Product::whereHas('category', function ($query) {
            $query->where('name', 'Electronics');
        })->take(4)->get();

        $printers = Product::whereHas('category', function ($query) {
            $query->where('name', 'Printers');
        })->take(4)->get();

        $watches = Product::whereHas('category', function ($query) {
            $query->where('name', 'Watches');
        })->take(4)->get();

        $projectors = Product::whereHas('category', function ($query) {
            $query->where('name', 'Projectors');
        })->take(4)->get();

        $others = Product::whereHas('category', function ($query) {
            $query->where('name', 'Other');
        })->take(4)->get();

        $user = Auth::user();

        // Pass data to the view
        return view('store.index', [
            'electronics' => $electronics,
            'projectors' => $projectors,
            'watches' => $watches,
            'printers' => $printers,
            'others' => $others,
            'user' => $user
        ]);
    }


    public function sell()
    {
        $posts = Post::latest()->take(3)->get();

        return view('sell', ['posts' => $posts]);
    }
}
