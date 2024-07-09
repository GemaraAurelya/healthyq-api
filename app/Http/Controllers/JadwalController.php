<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Jadwal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JadwalController extends Controller
{
    public function getByDokterId(Request $request, $dokterId) : JsonResponse {
        $dokter = Dokter::find($dokterId);

        if ($dokter == null) {
            $data = [
                'message' => 'dokter tidak ditemukan'
            ];
            return response()->json($data, 404);
        }

        $jadwals = Jadwal::query()->where('dokter_id', $dokter->id)->with('dokter', 'hari', 'jam')->get();

        Log::debug("dokter id " . $dokter->nama_lengkap, ['data' => $jadwals]);

        return response()->json($jadwals, 200);
    }
}
