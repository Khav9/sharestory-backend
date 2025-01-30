<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\TagTranslation;
use Illuminate\Http\Request;


class TagTranslationsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setting.tag.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "here";
        $request->validate([
            'tag_id' => 'required | int',
            'language' => 'required | string',
            'translated' => 'required | string',
        ]);

        TagTranslation::create([
            'tag_id' => $request->tag_id,
            'language' => $request->language,
            'translated' => $request->translated,
        ]);

        return redirect()->back()->withSuccess('TagTranslation created !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $langs = config('app.locales');
        // $tags = Tag::all();
        $lang = session('locale');
        $tag = Tag::find($id);
        $tags = collect([$tag])->map(function ($tag) use ($lang) {
            $translation = TagTranslation::where('tag_id', $tag->id)
                ->where('language', $lang)
                ->first();

            $tag->tagname = $translation ? $translation->translated : $tag->tagname;
            return $tag;
        });

        $translations = TagTranslation::where('tag_id', $id)->get();

        return view('setting.tag.manage', ['tags' => $tags, 'langs' => $langs, 'translations' => $translations]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $translation = TagTranslation::find($id);
        $request->validate([
            'translated' => 'required|string|max:50',
        ]);
        $translation->translated = $request->input('translated');
        $translation->save();

        return redirect()->back()->withSuccess('TagTranslation updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $translation = TagTranslation::find($id);

        // Check if the translation exists
        if (!$translation) {
            return redirect()->back()->withError(__('tag_not_found'));
        }

        $translation->delete();  // or $translation->forceDelete() for soft deletes
        return redirect()->back()->withSuccess(__('tag_deleted'));
    }
}
