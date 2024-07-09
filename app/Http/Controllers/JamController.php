<?php

namespace App\Http\Controllers;

use App\Models\Jam;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JamController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        return response()->json(Jam::all());
    }
}
