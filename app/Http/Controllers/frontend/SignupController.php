<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SignupController extends Controller
{
    // Show the registration form
    public function index()
    {
        return view('frontend.partials.register');
    }

    // Handle form submission
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        try {
            // Create the user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Log in the user
            Auth::login($user);

            // Redirect with success message
            return redirect()->route('home')->with('success', 'Registration successful.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            // Redirect with error message
            return back()->with('error', 'Something went wrong.');
        }
    }

}
