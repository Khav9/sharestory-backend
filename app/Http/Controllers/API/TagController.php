<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\TagTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Get language from request (query param or header), fallback to session, then default to 'km'
            $lang = $request->query('lang', $request->header('Accept-Language', session('locale', 'km')));
    
            // Get all tags
            $tags = Tag::all();
    
            // Transform collection directly
            $tags->transform(function ($tag) use ($lang) {
                $translation = TagTranslation::where('tag_id', $tag->id)
                    ->where('language', $lang)
                    ->first();
                $tag->tagname = $translation ? $translation->translated : $tag->tagname;
                return $tag;
            });
    
            return response()->json(['message' => 'Tags retrieved successfully', 'data' => $tags]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve tags', 'message' => $e->getMessage()], 500);
        }
    }
    
}
