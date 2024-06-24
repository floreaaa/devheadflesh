<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PrayerController extends Controller
{
    public function index() {
 
          // Get all files from a specific directory
          $files = Storage::disk('public')->files('/uploads/');

          // Generate URLs for each file
          $fileUrls = [];
          foreach ($files as $file) {
              $fileUrls[] = Storage::url($file);
          }
  
          // Return URLs as a response
          return response()->json($fileUrls);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:mp3|max:15000',
        ]);
    
        //Object of type Illuminate Http\Illuminate\UploadedFile
        $file = $request->file('file');

        // Generate the file URL
        $path = $file->storeAs('/public/uploads', $file->getClientOriginalName());

        return response()->json(['url' => $path], 200);
    }

    public function userstore(Request $request) 
    {
        $directoryPath = 'public/uploads/u';
    
        // Check if the directory already exists
        if (!Storage::exists($directoryPath)) {
            Storage::makeDirectory($directoryPath);
            return 'Directory created successfully!';
        } else {
            return 'Directory already exists.';
        }
    }
}
