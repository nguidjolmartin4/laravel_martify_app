<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * This function returns the admin dashboard view
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * This function handles admin login functionality
     */
    public function login(Request $request)
    {
        // Validate the passkey
        $request->validate([
            'passkey' => ['required', 'string']
        ]);

        // Check if the passkey matches the predefined admin passkey
        $adminPasskey = 'password123'; // Set your admin passkey here

        if ($request->input('passkey') === $adminPasskey) {
            // Log in as the admin user
            $adminUser = User::where('role', 'admin')->first();
            if ($adminUser) {
                Auth::login($adminUser);
                return redirect()->route('admin.dashboard');
            } else {
                return back()->withErrors(['passkey' => 'No admin user found']);
            }
        } else {
            return back()->withErrors(['passkey' => 'Invalid passkey']);
        }
    }

    /**
     * This function handles admin logout functionality
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect();
    }
}
