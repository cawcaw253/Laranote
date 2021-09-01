<?php

namespace App\Modules;

use Illuminate\Support\Facades\Storage;

class FileUploadModule
{
    private const DEFAULT_PATH = '/images/';

    private string $path;

    /**
     * Default Constructor
     * @return self
     */
    public function __construct()
    {
        $this->path = self::DEFAULT_PATH;
    }

    /**
     * @param \Illuminate\Http\UploadedFile $file
     * @return string|false
     */
    public function upload($file)
    {
        $current = now();
        $name = $current->format('H:i:s') . '-' . $file->getClientOriginalName();
        $path = $this->path . $current->format('Y-m-d');

        return Storage::putFileAs($path, $file, $name);
    }
}
