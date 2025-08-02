<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Upload to Public Folder
 * Upload an image and return its URL.
 *
 * @param  \Illuminate\Http\UploadedFile  $image
 * @param  string  $directory
 * @return string
 */
function uploadImage($file, $folder) {
    if (!$file->isValid()) {
        return null;
    }

    $imageName = Str::slug(time()) . rand() . '.' . $file->extension();
    $path      = public_path('uploads/' . $folder);
    if (!file_exists($path)) {
        mkdir($path, 0755, true);
    }
    $file->move($path, $imageName);
    return 'uploads/' . $folder . '/' . $imageName;
}
