<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        try {
            $posts = Post::where('user_id', Auth::id())->get();
            return response()->json(['message' => 'Posts retrieved successfully', 'data' => $posts]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve posts', 'message' => $e->getMessage()], 500);
        }
    }
}
