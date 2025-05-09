<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // // Validate the request
        // $request->validate([
        // 'document' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        // ]);
        // // Store the file
        // $path = $request->file('document')->store('uploads', 'public');
        // // Return a response
        // return response()->json(['path' => $path], 200);
        $this -> store($request);
    }

    public function store(Request $request)
    {
        $request->validate([
            'document' => 'required|image|max:2048' // Validation rules for upload 
        ]);

        $image = $request->file('document');
        $fileName = uniqid() . '.' . $image->getClientOriginalExtension();

        $path = $image->storeAs('uploads', $fileName);
        
        $Newpath = Storage::disk("minio") -> putFileAs('uploads', $image, $fileName);

        $thumbnailPath = 'thumbnails/' . $fileName;

        $intervention = Image::make($image->getRealPath());
        $intervention->fit(200, 200, function ($constraint) {
        $constraint->aspectRatio();
        })->save(storage_path('app/public/' . $thumbnailPath));

        $thumbnailFullPath = storage_path('app/public/' . $thumbnailPath);

        $NewThumb = Storage::disk('minio')->put('thumbnails/' . $fileName, file_get_contents($thumbnailFullPath));

        return response()->json(['path' => $path,
        'thumbnail' => $thumbnailPath,
        ]
        , 200);
    }
}