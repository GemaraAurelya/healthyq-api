<?php

namespace App\Http\Controllers;

use App\Models\Hari;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HariController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        return response()->json(Hari::all());
    }
}
