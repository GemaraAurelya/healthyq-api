<?php

namespace App\Http\Controllers;

use App\Models\Spesialis;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SpesialisController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        return response()->json(Spesialis::all());
    }
}
