<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Extract names from full name
        $nameParts = explode(' ', $googleUser->name, 2);
        $firstName = $nameParts[0] ?? '';
        $lastName = $nameParts[1] ?? '';

        // Find or create a user
        $user = User::where('google_id', $googleUser->id)->first();

        if (!$user) {
            // Create a new user
            $user = User::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'email_verified_at' => now()
            ]);
        }

        // Log the user in
        Auth::login($user, true);

        // Login successful
        return redirect()->intended();
    }
}
