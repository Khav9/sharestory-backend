<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

class PostController extends Controller
{
    public function index()
    {
        try {
            $posts = Post::where('publish', 1)->get()->map(function ($post) {
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

    public function show($id)
    {
        try {
            $post = Post::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $post,
                'message' => 'Post retrieved successfully'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 404);
        } catch (Throwable $e) {
            Log::error($e);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while retrieving the post.'
            ], 500);
        }
    }
}
