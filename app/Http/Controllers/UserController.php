<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\Agenda;

class UserController extends Controller
{
    /**
     * Show user homepage
     */
    public function index()
    {
        $posts = Post::with('kategori')->where('status', 'published')->latest()->take(6)->get();
        $galleries = Gallery::with('fotos')->latest()->take(6)->get();
        $agendas = Agenda::where('status', 'upcoming')->latest()->take(3)->get();
        
        return view('user.home', compact('posts', 'galleries', 'agendas'));
    }

    public function gallery()
    {
        $galleries = Gallery::with('fotos')->latest()->paginate(12);
        return view('user.gallery', compact('galleries'));
    }

    public function posts()
    {
        $posts = Post::with('kategori')->where('status', 'published')->latest()->paginate(10);
        return view('user.posts', compact('posts'));
    }

    public function agenda()
    {
        $agendas = Agenda::latest()->paginate(10);
        return view('user.agenda', compact('agendas'));
    }
}
