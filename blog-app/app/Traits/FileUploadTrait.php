<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;

trait FileUploadTrait
{
    function handleFileUpload(Request $request, string $fieldName, ?string $oldPath = null, string $dir = 'uploads'): ?string
    {
        // Check request has a file
        if (!$request->hasFile($fieldName)) {
            return null;
        }
        // Delete the existing image if exists  
        if ($oldPath && File::exists(public_path($oldPath))) {
            File::delete(public_path($oldPath));
        }

        /*
         NOT REQUIRED NOW WILL BE HELPFUL NEAR FURTURE:
         *to get only specific thing: $updatedFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
         *to get name with random string: $updatedFileName = $file->getClientOriginalName(); //. '_' . \Str::random(2);
         */
        $file = $request->file($fieldName);
        $extension = $file->getClientOriginalExtension();
        $imageName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $updatedFileName = $imageName . '.' . $extension;
        // $updatedFileName = \Str::random(20) . '.' . $extension;
        $file->move(public_path($dir), $updatedFileName);
        $filePath = $dir . '/' . $updatedFileName;

        return $filePath;

    }
}

