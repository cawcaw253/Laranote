<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        logger($request->all());
        return response()->json([
            'path' => 'ok'
        ]);
    }
}
