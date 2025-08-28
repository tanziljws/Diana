<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Foto;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('fotos')->latest()->get();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        $posts = \App\Models\Post::all();
        return view('admin.galleries.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id_p',
            'position' => 'required|integer',
            'status' => 'required|in:active,inactive',
            'photos' => 'required|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gallery = Gallery::create([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request->status
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photoName = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/gallery'), $photoName);
                
                Foto::create([
                    'gallery_id' => $gallery->id_g,
                    'file' => 'uploads/gallery/' . $photoName,
                    'judul' => $photoName
                ]);
            }
        }

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery berhasil dibuat!');
    }

    public function show(Gallery $gallery)
    {
        $gallery->load('fotos');
        return view('admin.galleries.show', compact('gallery'));
    }

    public function edit(Gallery $gallery)
    {
        $gallery->load('fotos');
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'nama_gallery' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $gallery->update([
            'nama_gallery' => $request->nama_gallery,
            'deskripsi' => $request->deskripsi
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/gallery'), $imageName);
                
                Foto::create([
                    'gallery_id' => $gallery->id,
                    'nama_foto' => $imageName,
                    'path_foto' => 'uploads/gallery/' . $imageName
                ]);
            }
        }

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery berhasil diupdate!');
    }

    public function destroy(Gallery $gallery)
    {
        // Delete all photos
        foreach ($gallery->fotos as $foto) {
            if (file_exists(public_path($foto->path_foto))) {
                unlink(public_path($foto->path_foto));
            }
        }
        
        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery berhasil dihapus!');
    }

    public function deletePhoto($id)
    {
        $foto = Foto::findOrFail($id);
        
        if (file_exists(public_path($foto->path_foto))) {
            unlink(public_path($foto->path_foto));
        }
        
        $foto->delete();

        return back()->with('success', 'Foto berhasil dihapus!');
    }
}
