<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('uploads', 'directly_to_public');
            Log::debug("path", ['data' => $path]);

            return response()->json(['url' => $path], 200);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
