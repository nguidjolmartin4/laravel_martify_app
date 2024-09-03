<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * This function handles the data to be sent to the user dashboard view
     */
    public function index()
    {
        // Fetch total number of orders
        $totalOrders = DB::table('orders')->count();

        // Calculate order growth percentage
        $previousOrderCount = DB::table('orders')
            ->where('created_at', '<', now()->subYear())
            ->count();
        $orderGrowthPercentage = $previousOrderCount > 0
            ? (($totalOrders - $previousOrderCount) / $previousOrderCount) * 100
            : 0;

        // Fetch total number of active products
        $totalActiveProducts = DB::table('products')
            ->where('status', 'available')
            ->count();

        // Fetch total number of sold products
        $totalSoldProducts = DB::table('products')
            ->where('status', 'sold')
            ->count();

        // Calculate sold products growth percentage
        $previousSoldProductsCount = DB::table('products')
            ->where('status', 'sold')
            ->where('updated_at', '<', now()->subYear())
            ->count();
        $soldProductsGrowthPercentage = $previousSoldProductsCount > 0
            ? (($totalSoldProducts - $previousSoldProductsCount) / $previousSoldProductsCount) * 100
            : 0;

        // Fetch total number of active blog posts
        $totalActivePosts = DB::table('posts')
            ->where('user_id', Auth::user()->id)
            ->count();

        // Fetch product data
        $products = Product::latest()->get();

        // Get the authenticated user
        $user = Auth::user();

        // Return view with data
        return view('users.dashboard', [
            'totalOrders' => $totalOrders,
            'orderGrowthPercentage' => number_format($orderGrowthPercentage, 2),
            'totalActiveProducts' => $totalActiveProducts,
            'totalSoldProducts' => $totalSoldProducts,
            'soldProductsGrowthPercentage' => number_format($soldProductsGrowthPercentage, 2),
            'totalActivePosts' => $totalActivePosts,
            'products' => $products,
            'user' => $user,
        ]);
    }

    public function orders()
    {
        $user = Auth::user();

        return view('users.orders', ['user' => $user]);
    }

    public function transactions()
    {
        $user = Auth::user();

        return view('users.transactions', ['user' => $user]);
    }

    public function chat()
    {
        $user = Auth::user();

        return view('users.chat', ['user' => $user]);
    }

    /**
     * This function returns the view for the user profile
     */
    public function profile(User $user)
    {
        $user = Auth::user();

        return view('users.profile', ['user' => $user]);
    }

    /**
     * This function actually handles updating user info (without password)
     */
    public function update_user_info(Request $request)
    {
        // Validate the request data
        $fields = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'country' => 'nullable|string|max:255',
            'region' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'telephone' => 'nullable|numeric|digits_between:1,15',
            'profile_picture' => 'nullable|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Get the current authenticated user
        $user = Auth::user();

        // Update the user's basic information
        $user->first_name = $fields['first_name'];
        $user->last_name = $fields['last_name'];
        $user->email = $fields['email'];
        $user->country = $fields['country'] ?? $user->country;
        $user->region = $fields['region'] ?? $user->region;
        $user->city = $fields['city'] ?? $user->city;
        $user->address = $fields['address'] ?? $user->address;
        $user->telephone = $fields['telephone'] ?? $user->telephone;

        // Handle the profile picture upload if a new one is provided
        if ($request->hasFile('profile_picture')) {
            // Store the new profile picture
            $profilePicturePath = $request->file('profile_picture')->store('images/profile_pictures', 'public');

            // Delete the old profile picture if it exists and isn't the default one
            if ($user->profile_picture && $user->profile_picture != 'images/default-profile.webp') {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Update the user's profile picture path
            $user->profile_picture = $profilePicturePath;
        }

        // Save the changes to the database
        $user->save();

        // Redirect back with a success message
        return back()->with('status', 'Profile successfully updated!');
    }

    /**
     * This function actually handles updating user password
     */
    public function update_user_password(Request $request)
    {
        // Validate the request data
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed'
        ]);

        // Get the current authenticated user
        $user = Auth::user();

        // Check if the current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Redirect back with a success message
        return back()->with('status', 'Password successfully updated!');
    }
}
