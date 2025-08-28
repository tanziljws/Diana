<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\AgendaController as AdminAgendaController;
use App\Http\Controllers\Admin\KategoriController as AdminKategoriController;

Route::get('/', function () {
    return view('welcome');
});

// Admin routes
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Admin CRUD routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('posts', AdminPostController::class);
    Route::resource('galleries', AdminGalleryController::class);
    Route::resource('agendas', AdminAgendaController::class);
    Route::resource('kategoris', AdminKategoriController::class);
    Route::delete('/galleries/photo/{id}', [AdminGalleryController::class, 'deletePhoto'])->name('galleries.photo.delete');
});

// User routes
Route::get('/user', [UserController::class, 'index'])->name('user.home');
Route::get('/gallery', [UserController::class, 'gallery'])->name('gallery.index');
Route::get('/posts', [UserController::class, 'posts'])->name('posts.index');
Route::get('/agenda', [UserController::class, 'agenda'])->name('agenda.index');
