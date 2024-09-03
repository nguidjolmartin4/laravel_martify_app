<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'password.letters' => 'The password must contain at least one letter.',
            'password.mixedCase' => 'The password must contain at least one uppercase and one lowercase letter.',
            'password.numbers' => 'The password must contain at least one number.',
            'password.symbols' => 'The password must contain at least one special character.',
        ];

        // Validate User Input with custom error messages
        $fields = $request->validate([
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'confirmed',  Password::min(8)->letters()->mixedCase()->numbers()->symbols()]
        ], $messages);

        // Hash the password before storing it
        $fields['password'] = bcrypt($fields['password']);

        // Assign the default profile picture path
        $fields['profile_picture'] = 'images/profile_pictures/default_picture.webp';

        // Register the user with the provided fields
        $user = User::create($fields);

        // Login the user
        Auth::login($user);

        // event(new Registered($user));

        // if ($request->subscribe) {
        //     event(new UserSubscribed($user));
        // }

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

        // Check if the email exists and belongs to a user with the 'user' role
        $user = User::where('email', $fields['email'])
            ->where('role', 'user') // Assuming 'role' is the column name
            ->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'We didn\'t find any user with this email in our records or the user is not authorized.'
            ]);
        }

        // Check if the password is correct
        if (!Auth::attempt(['email' => $fields['email'], 'password' => $fields['password']], $request->remember)) {
            return back()->withErrors([
                'password' => 'The provided password is incorrect.'
            ]);
        }

        // Login successful
        return redirect()->intended();
    }

    /**
     * 
     */
    public function verifyNotice()
    {
        return view('auth.verify-email');
    }

    /**
     * 
     */
    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('user.dashboard')->route('user.dashboard');
    }

    /**
     * 
     */
    public function verifyHandler(Request $request)
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
