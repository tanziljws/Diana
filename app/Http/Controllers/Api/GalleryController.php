<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::with(['post', 'fotos'])->where('status', 'active')->get();

        return response()->json([
            'success' => true,
            'data' => $galleries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|exists:posts,id_p',
            'position' => 'required|integer',
            'status' => 'in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $gallery = Gallery::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Gallery created successfully',
            'data' => $gallery->load('post')
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        if ($gallery->status !== 'active' && !auth()->user()?->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Gallery not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $gallery->load('post', 'fotos')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'sometimes|required|exists:posts,id_p',
            'position' => 'sometimes|required|integer',
            'status' => 'sometimes|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $gallery->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Gallery updated successfully',
            'data' => $gallery->load('post')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        // Delete associated photos
        foreach ($gallery->fotos as $foto) {
            if (Storage::exists('public/photos/' . $foto->file)) {
                Storage::delete('public/photos/' . $foto->file);
            }
        }

        $gallery->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gallery deleted successfully'
        ]);
    }

    /**
     * Upload photo to gallery
     */
    public function uploadPhoto(Request $request, Gallery $gallery)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            $file->storeAs('public/photos', $filename);

            $foto = Foto::create([
                'gallery_id' => $gallery->id_g,
                'file' => $filename,
                'judul' => $request->judul,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Photo uploaded successfully',
                'data' => $foto
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'No file uploaded'
        ], 400);
    }

    /**
     * Delete photo from gallery
     */
    public function deletePhoto(Foto $foto)
    {
        if (Storage::exists('public/photos/' . $foto->file)) {
            Storage::delete('public/photos/' . $foto->file);
        }

        $foto->delete();

        return response()->json([
            'success' => true,
            'message' => 'Photo deleted successfully'
        ]);
    }
}
