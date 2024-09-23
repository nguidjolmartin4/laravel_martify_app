<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        View::composer('*', function ($view) {
            // Check if the user is authenticated
            if (Auth::check()) {
                $userId = Auth::id();
                // Retrieve the cart for authenticated user
                $cart = Cart::where('user_id', $userId)->first();
            } else {
                // Retrieve cart for guest user based on session ID
                $sessionId = Session::getId();
                $cart = Cart::where('session_id', $sessionId)->first();
            }

            // Check if the cart exists, otherwise use an empty collection
            $cartItems = $cart ? $cart->cartItems()->with('product')->get() : collect();

            $user = Auth::user();

            // Share this with all views/components
            $view->with([
                'cartItems' => $cartItems,
                'user' => $user
            ]);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
