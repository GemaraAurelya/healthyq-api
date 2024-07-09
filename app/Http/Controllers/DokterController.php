<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        return response()->json(Dokter::query()->with('spesialis')->get());
    }

    public function destroy(Request $request, Dokter $dokter): JsonResponse
    {
        try {
            $dokter->delete();

            return response()->json($dokter, 204);
        } catch (\Throwable $th) {
            $data = [
                'message' => 'gagal delete dokter',
                'error' => $th->getMessage()
            ];
            return response()->json($data, 400);
        }
    }
}
