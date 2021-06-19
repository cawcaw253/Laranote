<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;

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
}
