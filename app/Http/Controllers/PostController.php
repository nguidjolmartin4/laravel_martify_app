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

        // Create a post
        $post = Auth::user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
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
        $user = Auth::user();

        // Check if the authenticated user is the owner of the post
        if ($user->id !== $post->user_id) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to update this post.');
        }

        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update the post with the validated data
        $post->update($validatedData);

        // Handle file upload if needed
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('posts', 'public');
            $post->cover_image = $path;
            $post->save();
        }

        // Redirect back with a success message
        return redirect()->route('posts.show', $post->id)->with('success', 'Post updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $user = Auth::user();

        // Check if the user is the post owner or the admin (id = 1)
        if ($user->id !== $post->user_id && $user->id !== 1) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to delete this post.');
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
