<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

// Public data routes
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::get('/posts/category/{kategoriId}', [PostController::class, 'byCategory']);
Route::get('/kategoris', [KategoriController::class, 'index']);
Route::get('/kategoris/{id}', [KategoriController::class, 'show']);
Route::get('/galleries', [GalleryController::class, 'index']);
Route::get('/galleries/{id}', [GalleryController::class, 'show']);
Route::get('/agendas', [AgendaController::class, 'index']);
Route::get('/agendas/upcoming', [AgendaController::class, 'upcoming']);
Route::get('/agendas/{id}', [AgendaController::class, 'show']);
Route::get('/profiles', [ProfileController::class, 'index']);
Route::get('/profiles/{id}', [ProfileController::class, 'show']);

// Protected routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Admin only routes
    Route::middleware('admin')->group(function () {
        // Posts management
        Route::post('/posts', [PostController::class, 'store']);
        Route::put('/posts/{id}', [PostController::class, 'update']);
        Route::delete('/posts/{id}', [PostController::class, 'destroy']);

        // Categories management
        Route::post('/kategoris', [KategoriController::class, 'store']);
        Route::put('/kategoris/{id}', [KategoriController::class, 'update']);
        Route::delete('/kategoris/{id}', [KategoriController::class, 'destroy']);

        // Galleries management
        Route::post('/galleries', [GalleryController::class, 'store']);
        Route::put('/galleries/{id}', [GalleryController::class, 'update']);
        Route::delete('/galleries/{id}', [GalleryController::class, 'destroy']);
        Route::post('/galleries/{gallery_id}/photos', [GalleryController::class, 'uploadPhoto']);
        Route::delete('/photos/{id}', [GalleryController::class, 'deletePhoto']);

        // Agendas management
        Route::post('/agendas', [AgendaController::class, 'store']);
        Route::put('/agendas/{id}', [AgendaController::class, 'update']);
        Route::delete('/agendas/{id}', [AgendaController::class, 'destroy']);

        // Profiles management
        Route::post('/profiles', [ProfileController::class, 'store']);
        Route::put('/profiles/{id}', [ProfileController::class, 'update']);
        Route::delete('/profiles/{id}', [ProfileController::class, 'destroy']);
    });
});



