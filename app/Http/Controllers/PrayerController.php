<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PrayerController extends Controller
{
    public function index() {
 
        // Get all files in the specified directory
        $directory = public_path('uploads');
        $files = File::files($directory);

        // Initialize an array to hold the URLs
        $filesUrls = [];

        // Iterate through the files and generate their URLs
        foreach ($files as $file) {
            // Get the relative path of the file
            $relativePath = $file->getRelativePathname();

            // Generate the full URL
            $url = Storage::url($relativePath);

            // Add the URL to the array
            $filesUrls[] = $url;
        }

        // Return the array of URLs
        return array_map(function($url) {
            return str_replace('storage', 'uploads', $url);
        }, $filesUrls);

    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:mp3|max:15000',
        ]);

        // Retrieve the uploaded file
        $file = $request->file('file');

        $fileName = $file->getClientOriginalName();

        $destinationPath = public_path('uploads');
        $file->move($destinationPath, $fileName);
        $fileUrl = asset('uploads/' . $fileName);

        // Return a response with the file URL
        return response()->json(['url' => $fileUrl], 200);
    }
}
