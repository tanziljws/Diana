<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryLike;
use App\Models\GalleryView;
use App\Models\GalleryComment;
use Illuminate\Support\Facades\Auth;

class GalleryInteractionController extends Controller
{
    // Toggle like
    public function toggleLike(Request $request, $galleryId)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Please login first'], 401);
        }

        $userId = Auth::id();
        $like = GalleryLike::where('user_id', $userId)->where('gallery_id', $galleryId)->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            GalleryLike::create([
                'user_id' => $userId,
                'gallery_id' => $galleryId
            ]);
            $liked = true;
        }

        $totalLikes = GalleryLike::where('gallery_id', $galleryId)->count();

        return response()->json([
            'success' => true,
            'liked' => $liked,
            'total_likes' => $totalLikes
        ]);
    }

    // Record view
    public function recordView(Request $request, $gallery)
    {
        \Log::info('recordView called', [
            'gallery_id' => $gallery,
            'user' => Auth::check() ? Auth::id() : 'guest',
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        try {
            // If $gallery is not an object, try to find it
            if (!is_object($gallery)) {
                $gallery = \App\Models\Gallery::find($gallery);
                \Log::info('Found gallery by ID', ['gallery' => $gallery]);
            }
            
            if (!$gallery) {
                \Log::error('Gallery not found', ['gallery_id' => $gallery]);
                return response()->json(['success' => false, 'message' => 'Gallery not found'], 404);
            }
            
            // Increment view count
            $gallery->increment('views');
            \Log::info('View count incremented', ['gallery_id' => $gallery->id, 'new_count' => $gallery->views]);
            
            // If user is logged in, also record the view in gallery_views table
            if (Auth::check()) {
                $userId = Auth::id();
                
                // Check if user has already viewed this gallery
                $existingView = \App\Models\GalleryView::where('user_id', $userId)
                    ->where('gallery_id', $gallery->id)
                    ->first();
                    
                if (!$existingView) {
                    // Record view
                    $view = \App\Models\GalleryView::create([
                        'user_id' => $userId,
                        'gallery_id' => $gallery->id,
                        'ip_address' => $request->ip(),
                        'user_agent' => $request->userAgent()
                    ]);
                    \Log::info('New view recorded', ['view' => $view]);
                } else {
                    \Log::info('View already exists', ['existing_view' => $existingView]);
                }
            }
            
            // Refresh the gallery to get the updated view count
            $gallery->refresh();
            
            return response()->json([
                'success' => true,
                'views' => $gallery->views
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Error in recordView', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error recording view: ' . $e->getMessage()
            ], 500);
        }
    }

    // Add comment
    public function addComment(Request $request, $galleryId)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Please login first'], 401);
        }

        $request->validate([
            'comment' => 'required|string|max:1000'
        ]);

        $comment = GalleryComment::create([
            'user_id' => Auth::id(),
            'gallery_id' => $galleryId,
            'comment' => $request->comment
        ]);

        $comment->load('user');

        return response()->json([
            'success' => true,
            'comment' => $comment
        ]);
    }

    // Get gallery stats
    public function getStats($galleryId)
    {
        $likes = GalleryLike::where('gallery_id', $galleryId)->with('user:id,name')->get();
        $views = GalleryView::where('gallery_id', $galleryId)->count();
        $comments = GalleryComment::where('gallery_id', $galleryId)->with('user:id,name,email')->latest()->get();

        $userLiked = false;
        if (Auth::check()) {
            $userLiked = GalleryLike::where('user_id', Auth::id())->where('gallery_id', $galleryId)->exists();
        }

        return response()->json([
            'success' => true,
            'likes' => $likes->count(),
            'views' => $views,
            'comments' => $comments,
            'user_liked' => $userLiked,
            'liked_by' => $likes->pluck('user.name')
        ]);
    }
}
