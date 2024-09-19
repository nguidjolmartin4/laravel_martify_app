<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Product $product)
    {
        // Step 1: Determine if user is authenticated or guest
        if (Auth::check()) {
            // Authenticated user
            $user_id = Auth::id();
            $cart = Cart::firstOrCreate([
                'user_id' => $user_id,
            ], [
                'total' => 0,
            ]);
        } else {
            // Guest user
            $session_id = session()->getId();
            $cart = Cart::firstOrCreate([
                'session_id' => $session_id,
            ], [
                'total' => 0,
            ]);
        }

        // // Step 2: Check if the product is already in the cart
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            // Product is already in the cart, update quantity
            $cartItem->increment('quantity');
            $cart->total += $product->price; // Update cart total
            $cart->save();

            return redirect()->back()->with('info', 'Quantity of this product has been updated in your cart.');
        } else {
            // Step 3: Add product to cart items (if not already in cart)
            $cartItem = CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'price' => $product->price,
                'quantity' => 1,
            ]);

            $cart->total += $product->price; // Update cart total
            $cart->save();

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // Step 1: Determine if user is authenticated or a guest
        if (Auth::check()) {
            // Authenticated user
            $user_id = Auth::id();
            $cart = Cart::where('user_id', $user_id)->first();
        } else {
            // Guest user
            $session_id = session()->getId();
            $cart = Cart::where('session_id', $session_id)->first();
        }

        // Step 2: If the cart exists, retrieve the cart items
        if ($cart) {
            $cartItems = CartItem::where('cart_id', $cart->id)
                ->with('product') // Load related product information
                ->get();
        } else {
            $cartItems = collect(); // Return an empty collection if no cart exists
        }

        // Step 3: Pass the cart items to the view
        return view('store.cart', [
            'cartItems' => $cartItems,
            'cartTotal' => $cart ? $cart->total : 0
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $cartItemId)
    {
        // Step 1: Retrieve the cart item
        $cartItem = CartItem::find($cartItemId);

        // Step 2: Ensure the cart item exists
        if (!$cartItem) {
            return redirect()->back()->withErrors(['Cart item not found']);
        }

        // Step 3: Check if the user is authenticated or a guest
        if (Auth::check()) {
            // Authenticated user: ensure the cart belongs to the user
            if ($cartItem->cart->user_id !== Auth::id()) {
                return redirect()->back()->withErrors(['Unauthorized action']);
            }
        } else {
            // Guest user: ensure the session matches
            if ($cartItem->cart->session_id !== Session::getId()) {
                return redirect()->back()->withErrors(['Unauthorized action']);
            }
        }

        $request->validate([
            'action' => 'required|in:increase,decrease',
        ]);

        // Step 4: Adjust the quantity based on user input
        if ($request->action === 'increase') {
            $cartItem->increment('quantity');
        } elseif ($request->action === 'decrease') {
            $cartItem->decrement('quantity');

            // If quantity reaches 0, delete the item
            if ($cartItem->quantity <= 0) {
                $cartItem->delete();
                return redirect()->back()->with('info', 'Item removed from the cart.');
            }
        }

        // Step 5: Recalculate the total cart price
        $cart = $cartItem->cart;
        $cart->total = $cart->cartItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });
        $cart->save();

        return redirect()->back()->with('success', 'Cart updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($cartItemId)
    {
        // Step 1: Retrieve the cart item
        $cartItem = CartItem::find($cartItemId);

        // Step 2: Ensure the cart item exists
        if (!$cartItem) {
            return redirect()->back()->withErrors(['Cart item not found']);
        }

        // Step 3: Check if the cart belongs to the authenticated user or the current session (guest user)
        $cart = Auth::check()
            ? Cart::where('user_id', Auth::id())->first()
            : Cart::where('session_id', session()->getId())->first();

        // Step 4: Ensure the cart exists and the cart item belongs to that cart
        if (!$cart || $cartItem->cart_id !== $cart->id) {
            return redirect()->back()->withErrors(['error' => 'Unauthorized action or item not found in your cart.']);
        }

        $cartItem->delete();

        // Recalculate total price
        $cartItem->cart->total = $cartItem->cart->cartItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });

        $cartItem->cart->save();

        return redirect()->back()->with('success', 'Item removed from cart successfully.');
    }

    public function viewCart() {}

    public function add_to_fav() {}
}
