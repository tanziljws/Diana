<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $kategoris = \App\Models\Kategori::all();
        return view('admin.galleries.create', compact('posts', 'kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori_id' => 'required|exists:kategori,id_k',
            'post_id' => 'nullable|exists:posts,id_p',
            'position' => 'required|integer',
            'status' => 'required|in:active,inactive',
            'photos' => 'required|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gallery = Gallery::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
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
        $posts = \App\Models\Post::all();
        $kategoris = \App\Models\Kategori::all();
        return view('admin.galleries.edit', compact('gallery', 'posts', 'kategoris'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori_id' => 'required|exists:kategori,id_k',
            'post_id' => 'nullable|exists:posts,id_p',
            'position' => 'required|integer',
            'status' => 'required|in:active,inactive',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $gallery->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
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

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery berhasil diupdate!');
    }

    public function destroy(Gallery $gallery)
    {
        // Delete all photo records from database only
        foreach ($gallery->fotos as $foto) {
            $foto->delete();
        }
        
        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery berhasil dihapus!');
    }

    public function deletePhoto(Request $request, $id)
    {
        try {
            $foto = Foto::where('id_f', $id)->firstOrFail();
            
            \Log::info('Deleting photo record:', [
                'id' => $id,
                'file_field' => $foto->file ?? 'empty',
                'path_foto_field' => $foto->path_foto ?? 'empty'
            ]);
            
            // Only delete the database record for now
            // Skip file deletion to avoid unlink errors
            $foto->delete();
            \Log::info('Database record deleted successfully');
            
            return back()->with('success', 'Foto berhasil dihapus!');
            
        } catch (\Exception $e) {
            \Log::error('Error in deletePhoto: ' . $e->getMessage(), [
                'id' => $id
            ]);
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
