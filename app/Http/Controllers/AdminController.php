<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Kategori;
use App\Models\Gallery;
use App\Models\Agenda;

class AdminController extends Controller
{
    /**
     * Show admin login page
     */
    public function login()
    {
        return view('admin.login');
    }

    /**
     * Show admin dashboard - no authentication for demo
     */
    public function dashboard()
    {
        // Get counts from database
        $totalPosts = Post::count();
        $totalCategories = Kategori::count();
        $totalGalleries = Gallery::count();
        $totalAgendas = Agenda::count();
        
        return view('admin.dashboard', compact('totalPosts', 'totalCategories', 'totalGalleries', 'totalAgendas'));
    }

    /**
     * Handle admin login - simple redirect for demo
     */
    public function authenticate(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        
        // Simple hardcoded authentication for demo
        if ($email === 'admin@oxfordhigh.edu' && $password === 'admin123') {
            return redirect()->route('admin.dashboard');
        }
        
        return back()->withErrors(['email' => 'Invalid credentials. Use: admin@oxfordhigh.edu / admin123']);
    }
}
