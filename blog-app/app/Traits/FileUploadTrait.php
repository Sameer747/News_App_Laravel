<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;

trait FileUploadTrait
{
    function handleFileUpload(Request $request, string $fieldName, ?string $oldPath = null, string $dir = 'uploads'): string
    {
        // Delete the existing image if exists  
        if ($oldPath && File::exists(public_path($oldPath))) {
            File::delete(public_path($oldPath));
        }
        // Check request has a file
        if (!$request->hasFile($fieldName)) {
            return "No file found";
        } else {
            $file = $request->file($fieldName);
            $updatedFileName = $file->getClientOriginalName(); //. '_' . \Str::random(2);
            $file->move(public_path($dir), $updatedFileName);
            $filePath = $dir . '/' . $updatedFileName;

            return $filePath;
        }
    }
}

