<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        try {
            $posts = Post::all()->map(function ($post) {
                $post->cover = $post->cover ? Storage::url($post->cover) : null;
                return $post;
            });
    
            return response()->json([
                'message' => 'Posts retrieved successfully',
                'data' => $posts
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to retrieve posts',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    
}
