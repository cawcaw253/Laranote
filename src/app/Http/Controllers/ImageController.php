<?php

namespace App\Http\Controllers;

use App\Modules\FileUploadModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $uploader = new FileUploadModule();

        $result = $uploader->upload($request->file('image'));

        return response()->json([
            'status' => 'ok',
            'path' => URL::to($result)
        ]);
    }
}
