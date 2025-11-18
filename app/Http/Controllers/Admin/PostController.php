<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('kategori')->latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.posts.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id_k',
            'status' => 'required|in:draft,published',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/posts'), $imageName);
            $data['image'] = 'uploads/posts/' . $imageName;
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post berhasil dibuat!');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $kategoris = Kategori::all();
        return view('admin.posts.edit', compact('post', 'kategoris'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id_k',
            'status' => 'required|in:draft,published',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            // Skip deleting old image to avoid unlink errors
            // if ($post->image && file_exists(public_path($post->image))) {
            //     unlink(public_path($post->image));
            // }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/posts'), $imageName);
            $data['image'] = 'uploads/posts/' . $imageName;
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post berhasil diupdate!');
    }

    public function destroy(Post $post)
    {
        // Skip deleting image file to avoid unlink errors
        // if ($post->image && file_exists(public_path($post->image))) {
        //     unlink(public_path($post->image));
        // }
        
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post berhasil dihapus!');
    }
}
