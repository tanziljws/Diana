<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\AgendaController;
use App\Http\Controllers\Api\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Public data routes - connected to database
Route::get('/posts', function() {
    try {
        $posts = DB::table('posts')
            ->leftJoin('kategori', 'posts.kategori_id', '=', 'kategori.id')
            ->select('posts.*', 'kategori.nama_kategori')
            ->get();
        
        // Map Indonesian column names to English for frontend compatibility
        $posts = $posts->map(function($post) {
            return [
                'id' => $post->id,
                'title' => $post->judul ?? $post->title ?? '',
                'content' => $post->isi ?? $post->content ?? '',
                'judul' => $post->judul ?? $post->title ?? '',
                'isi' => $post->isi ?? $post->content ?? '',
                'kategori_id' => $post->kategori_id,
                'image' => $post->gambar ?? $post->image ?? '',
                'gambar' => $post->gambar ?? $post->image ?? '',
                'nama_kategori' => $post->nama_kategori,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at
            ];
        });
        
        return response()->json($posts);
    } catch (Exception $e) {
        return response()->json(['error' => 'Database error: ' . $e->getMessage()], 500);
    }
});

Route::get('/kategoris', function() {
    $kategoris = DB::table('kategori')->get();
    return response()->json($kategoris);
});

Route::get('/galleries', function() {
    $galleries = DB::table('gallery')->get();
    return response()->json($galleries);
});

Route::get('/agendas', function() {
    $agendas = DB::table('agenda')->get();
    return response()->json($agendas);
});

// Admin CRUD routes - connected to database
// Posts management
Route::post('/posts', function(Request $request) {
    try {
        $data = [
            'created_at' => now(),
            'updated_at' => now()
        ];
        
        // Map English field names to Indonesian database columns
        if ($request->has('title')) {
            $data['judul'] = $request->title;
        }
        if ($request->has('content')) {
            $data['isi'] = $request->content;
        }
        if ($request->has('kategori_id')) {
            $data['kategori_id'] = $request->kategori_id;
        }
        if ($request->has('image')) {
            $data['gambar'] = $request->image;
        }
        
        $id = DB::table('posts')->insertGetId($data);
        return response()->json(['message' => 'Post created successfully', 'id' => $id]);
    } catch (Exception $e) {
        return response()->json(['error' => 'Database error: ' . $e->getMessage()], 500);
    }
});

Route::put('/posts/{id}', function(Request $request, $id) {
    try {
        $data = ['updated_at' => now()];
        
        if ($request->has('title')) {
            $data['judul'] = $request->title;
        }
        if ($request->has('content')) {
            $data['isi'] = $request->content;
        }
        if ($request->has('kategori_id')) {
            $data['kategori_id'] = $request->kategori_id;
        }
        if ($request->has('image')) {
            $data['gambar'] = $request->image;
        }
        
        DB::table('posts')->where('id', $id)->update($data);
        return response()->json(['message' => 'Post updated successfully']);
    } catch (Exception $e) {
        return response()->json(['error' => 'Database error: ' . $e->getMessage()], 500);
    }
});

Route::delete('/posts/{id}', function($id) {
    DB::table('posts')->where('id', $id)->delete();
    return response()->json(['message' => 'Post deleted successfully']);
});

// Categories management
Route::post('/kategoris', function(Request $request) {
    $id = DB::table('kategori')->insertGetId([
        'nama_kategori' => $request->nama_kategori,
        'deskripsi' => $request->deskripsi,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    return response()->json(['message' => 'Category created successfully', 'id' => $id]);
});

Route::put('/kategoris/{id}', function(Request $request, $id) {
    DB::table('kategori')->where('id', $id)->update([
        'nama_kategori' => $request->nama_kategori,
        'deskripsi' => $request->deskripsi,
        'updated_at' => now()
    ]);
    return response()->json(['message' => 'Category updated successfully']);
});

Route::delete('/kategoris/{id}', function($id) {
    DB::table('kategori')->where('id', $id)->delete();
    return response()->json(['message' => 'Category deleted successfully']);
});

// Galleries management
Route::post('/galleries', function(Request $request) {
    $id = DB::table('gallery')->insertGetId([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'tanggal' => $request->tanggal,
        'cover_image' => $request->cover_image,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    return response()->json(['message' => 'Gallery created successfully', 'id' => $id]);
});

Route::put('/galleries/{id}', function(Request $request, $id) {
    DB::table('gallery')->where('id', $id)->update([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'tanggal' => $request->tanggal,
        'cover_image' => $request->cover_image,
        'updated_at' => now()
    ]);
    return response()->json(['message' => 'Gallery updated successfully']);
});

Route::delete('/galleries/{id}', function($id) {
    DB::table('gallery')->where('id', $id)->delete();
    return response()->json(['message' => 'Gallery deleted successfully']);
});

// Agendas management
Route::post('/agendas', function(Request $request) {
    $id = DB::table('agenda')->insertGetId([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'tanggal' => $request->tanggal,
        'waktu' => $request->waktu,
        'tempat' => $request->tempat,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    return response()->json(['message' => 'Agenda created successfully', 'id' => $id]);
});

Route::put('/agendas/{id}', function(Request $request, $id) {
    DB::table('agenda')->where('id', $id)->update([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'tanggal' => $request->tanggal,
        'waktu' => $request->waktu,
        'tempat' => $request->tempat,
        'updated_at' => now()
    ]);
    return response()->json(['message' => 'Agenda updated successfully']);
});

Route::delete('/agendas/{id}', function($id) {
    DB::table('agenda')->where('id', $id)->delete();
    return response()->json(['message' => 'Agenda deleted successfully']);
});



