<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\TagMap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    /**
     * Display user lists
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tags', compact('tags'));
    }

    /**
     * Delete tag
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        if (!auth('admin')->check()) {
            return redirect()->back()->with('error', 'You do not have permission.');
        }

        DB::transaction(function () use ($request) {
            $tag = Tag::lockForUpdate()->findOrFail($request->input('tag_id'));
            $tagMap = TagMap::lockForUpdate()->where('tag_id', $tag->id);
            $tagMap->delete();
            $tag->delete();
        });

        return redirect()->back()->with('success', 'Tag successfully deleted');
    }

    /**
     * Update tag details
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        if (!auth('admin')->check()) {
            return redirect()->back()->with('error', 'You do not have permission.');
        }

        DB::transaction(function () use ($request) {
            $tag = Tag::lockForUpdate()->findOrFail($request->input('tag_id'));
            $tag->title = $request->input('tag_title');
            $tag->color_code = $request->input('tag_color_code');
            $tag->save();
        });

        return redirect()->back()->with('success', 'Tag successfully updated');
    }
}
