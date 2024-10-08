<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    /**
     * This function handles user registration : Ok
     */
    public function register(Request $request)
    {
        $messages = [
            'password.min' => 'The password must be at least 8 characters long.',
            'password.mixedCase' => 'The password must contain at an upper case letter',
            'password.numbers' => 'The password must contain at a digit.',
            'password.symbols' => 'The password must contain at a special character.',
        ];

        // Validate User Input with custom error messages
        $fields = $request->validate([
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'confirmed',  Password::min(8)->mixedCase()->numbers()->symbols()]
        ], $messages);

        // Hash the password before storing it
        $fields['password'] = bcrypt($fields['password']);

        // Assign the default profile picture path
        $fields['profile_picture'] = 'images/profile_pictures/default_picture.webp';

        // Register the user with the provided fields
        $user = User::create($fields);

        // Login the user
        Auth::login($user);

        event(new Registered($user));

        if ($request->subscribe) {
            event(new UserSubscribed($user));
        }

        // Redirect to the home page or another appropriate page
        return redirect()->route('home');
    }

    /**
     * This function handles user login : Ok 
     */
    public function login(Request $request)
    {
        // Validate user input
        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);

        // Check if the user exists
        $user = User::where('email', $fields['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'We didn\'t find any user with this email in our records.'
            ]);
        }

        // Check if the password is correct
        if (!Auth::attempt(['email' => $fields['email'], 'password' => $fields['password']], $request->remember)) {
            return back()->withErrors([
                'password' => 'The provided password is incorrect.'
            ]);
        }

        // Redirect based on user role
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard'); // Adjust to your admin dashboard route
        } else if ($user->role === 'user') {
            return redirect()->route('user.dashboard'); // Adjust to your regular user dashboard route
        }

        // Optional fallback if no role matches
        return redirect()->intended('/');
    }


    /**
     * This function handles email notice, it actually returns the view telling the user to verify the email
     */
    public function verifyEmailNotice()
    {
        return view('auth.verify-email');
    }

    /**
     * This function handles ... 
     */
    public function verifyEmailHandler(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('user.dashboard');
    }

    /**
     * This function handles resending the verfication email 
     */
    public function verifyEmailResend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }

    /**
     * This function handles user logout functionallity
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
