<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Register new user
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return response()->json([
            'success' => true,
            'user' => $user,
            'message' => 'Registration successful!'
        ]);
    }

    // Login user
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            
            // Set session flash message
            session()->flash('login_success', 'Berhasil login! Selamat datang ' . $user->name);
            
            return response()->json([
                'success' => true,
                'user' => $user,
                'message' => 'Login successful!',
                'redirect' => url('/user')
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid email or password'
        ], 401);
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully'
        ]);
    }

    // Get current user
    public function user(Request $request)
    {
        return response()->json([
            'success' => true,
            'user' => Auth::user()
        ]);
    }
}
