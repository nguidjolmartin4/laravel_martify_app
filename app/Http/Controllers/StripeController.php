<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index()
    {
        return view('store.cart');
    }

    public function checkout()
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create(
            [
                'line_items' => [
                    'price_data' => [
                        'currency' => 'xaf',
                        'product_data' => [
                            'name' => 'Samsung S20 Ultra 5G',
                        ],
                        'unit_amount' => 150000,
                    ],
                    'quantity' => 1,
                ],
                'mode' => 'payment',
                'success_url' => route('success'),
                'cancel_url' => route('index'),
            ],
        );

        return redirect()->away($session->url);
    }

    public function success()
    {
        return view('store.cart');
    }
}
