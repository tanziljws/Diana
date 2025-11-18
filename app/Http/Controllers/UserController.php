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
        
        // Update agenda statuses and get all agendas
        Agenda::updateExpiredAgendas();
        $agendas = Agenda::latest()->get();
        
        return view('user.home', compact('posts', 'galleries', 'agendas'));
    }

    public function gallery()
    {
        $galleries = Gallery::with('fotos', 'kategori')->latest()->paginate(12);
        $totalCategories = \App\Models\Kategori::has('galleries')->count();
        return view('user.gallery', compact('galleries', 'totalCategories'));
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

    public function showGallery($id)
    {
        $gallery = Gallery::with('fotos')->findOrFail($id);
        return view('user.gallery-detail', compact('gallery'));
    }
    
    public function showPost(Post $post)
    {
        if ($post->status !== 'published') {
            abort(404);
        }
        
        $relatedPosts = Post::where('kategori_id', $post->kategori_id)
            ->where('id', '!=', $post->id)
            ->where('status', 'published')
            ->latest()
            ->take(3)
            ->get();
            
        return view('user.post-detail', compact('post', 'relatedPosts'));
    }
}
