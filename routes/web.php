<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryInteractionController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\AgendaController as AdminAgendaController;
use App\Http\Controllers\Admin\KategoriController as AdminKategoriController;

Route::get('/', function () {
    return view('welcome');
});

// Test routes
Route::get('/test-route', function() {
    return 'Test route is working';
});

// Debug route for testing photo deletion
Route::get('/debug/photo/{id}', function($id) {
    return [
        'status' => 'success',
        'id' => $id,
        'type' => gettype($id),
        'route' => route('admin.galleries.photo.delete', ['id' => $id])
    ];
})->name('debug.photo');

// Admin routes
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Define the photo delete route outside any groups to avoid prefix issues
Route::delete('/admin/galleries/photo/{id}', [AdminGalleryController::class, 'deletePhoto'])
    ->name('admin.galleries.photo.delete')
    ->where('id', '\d+');

// Admin CRUD routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('posts', AdminPostController::class);
    Route::resource('galleries', AdminGalleryController::class);
    Route::resource('agendas', AdminAgendaController::class);
    Route::resource('kategoris', AdminKategoriController::class);
});

// Authentication routes
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/auth/user', [AuthController::class, 'user'])->name('auth.user');

// Web login route used by Laravel auth middleware (auth, auth:sanctum)
// When an unauthenticated user hits a protected route, they will be redirected here
Route::get('/login', function () {
    return redirect()->route('user.home');
})->name('login');

// Gallery Interaction routes
Route::post('/gallery/{id}/like', [GalleryController::class, 'toggleLike'])->name('gallery.like');


// User routes
Route::get('/user', [UserController::class, 'index'])->name('user.home');
Route::get('/posts', [UserController::class, 'posts'])->name('posts.index');
Route::get('/posts/{post}', [UserController::class, 'showPost'])->name('posts.show');
Route::get('/agenda', [UserController::class, 'agenda'])->name('agenda.index');

// Gallery routes - require authentication
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/gallery', [UserController::class, 'gallery'])->name('gallery.index');
    Route::get('/user/gallery/{id}', [UserController::class, 'showGallery'])->name('user.gallery.show');
});
