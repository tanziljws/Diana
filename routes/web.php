<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Admin routes
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
Route::get('/admin/dashboard', function() { return view('admin.dashboard'); })->name('admin.dashboard');

// User routes
Route::get('/user', [UserController::class, 'index'])->name('user.home');
Route::get('/gallery', [UserController::class, 'index'])->name('gallery.index');
