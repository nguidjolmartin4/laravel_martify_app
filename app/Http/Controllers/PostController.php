<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Adding Auth middleware to all methods except 'index' and 'show'
    public static function middleware(): array
    {
        return [
            new Middleware(['auth', 'verified'], except: ['index', 'show']),
        ];
    }

    /**
     * Display a listing of the resource in the blog page.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(9);

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        $user = Auth::user();

        return view('users.add-post', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'cover_image' => ['nullable', 'file', 'max:3000', 'mimes:webp,png,jpg,jpeg']
        ]);

        // Store image if exists
        $cover_image_path = null;

        if ($request->hasFile('cover_image')) {
            $cover_image_path = Storage::disk('public')->put('images/posts_images', $request->cover_image);
        }

        // In your PostController or wherever you handle the request
        $body = $request->input('body');
        $purifiedBody = app('purifier')->purify($body);

        // Create a post
        $post = Auth::user()->posts()->create([
            'title' => $request->title,
            'body' => $purifiedBody,
            'cover_image' => $cover_image_path
        ]);

        // Send email when users create a post (for practice)
        // Mail::to(Auth::user())->send(new WelcomeMail(Auth::user(), $post));

        // Redirect back to dashboard
        // return redirect()->route('user.dashboard')->with('success', 'Your post was created successfully!');
        return back()->with('success', 'Your post was created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // Retrieve the user associated with the post
        $user = $post->user;

        return view('posts.show', ['post' => $post, 'user' => $user]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $user = Auth::user();

        // Correct the variable name from 'posts' to 'post'
        return view('users.edit-post', ['post' => $post, 'user' => $user]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'cover_image' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            if ($post->cover_image) {
                Storage::disk('public')->delete($post->cover_image);
            }
            $coverImage = $request->file('cover_image')->store('images/posts_images', 'public');
            $post->update(['cover_image' => $coverImage]);
        }

        // In your PostController or wherever you handle the request
        $body = $request->input('body');
        $purifiedbody = app('purifier')->purify($body);

        // Save to database
        $post->body = $purifiedbody;

        $post->update($request->only('title', 'body'));

        // Redirect back with a success message
        return redirect()->route('posts.show', $post->id)->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->cover_image) {
            Storage::disk('public')->delete($post->cover_image);
        }

        // Delete the post
        $post->delete();

        // Redirect back to the dashboard with a success message
        return redirect()->route('dashboard')->with('delete', 'The post was deleted successfully!');
    }

    /**
     * Retrieve all the posts of the current user that are present in the database
     */
    public function all_posts()
    {
        $posts = Auth::user()->posts;
        $user = Auth::user();

        return view('users.posts', ['posts' => $posts, 'user' => $user]);
    }

    public function user_posts(User $user)
    {
        $userPosts = $user->posts()->latest()->paginate(9);

        return view('posts.user-posts', ['posts' => $userPosts, 'user' => $user]);
    }
}
