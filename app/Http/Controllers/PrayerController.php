<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrayerController extends Controller
{
    public function index() {
 
        // Specify the directory you want to list files from
        $directory = '/uploads';

        $files = Storage::allFiles($directory);

        $index = 0;
        $jsonFormatFiles = [];
        foreach ($files as $index => $value) {
            $jsonFormatFiles[] = [
                'id' => $index + 1, 
                'value' => 'public/' . $value
            ];
        }

        return response()->json($jsonFormatFiles);

    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'file' => 'required|mimes:mp3|max:15000',
        ]);

        // Retrieve the uploaded file
        $file = $request->file('file');

        // Generate a unique file name
        $fileName = $file->getClientOriginalName();

        // Store the file in the 'public/uploads' directory
        $path = $file->storeAs('/uploads', $fileName);

        // Return a response with the file path
        return response()->json(['path' => Storage::url($path)], 201);
    }
}
