<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Jadwal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DokterController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        return response()->json(Dokter::query()->with('spesialis')->get());
    }

    public function store(Request $request): JsonResponse
    {
        Log::debug($request->all());
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_sip' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'spesialis_id' => 'required|integer|exists:spesialis,id',
            'tanggal_lahir' => 'required|date',
            'profile_url' => 'required|string',
        ]);

        Log::debug($request);

        try {
            $data = [
                'nama_lengkap' => $request->nama_lengkap,
                'no_sip' => $request->no_sip,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'spesialis_id' => $request->spesialis_id,
                'tanggal_lahir' => $request->tanggal_lahir,
                'profile_url' => $request->profile_url,
            ];
            $dokter = Dokter::query()->create($data);
            $hari = $request->daftar_hari;
            $jam = $request->daftar_jam;
            foreach ($hari as $h) {
                foreach ($jam as $j) {
                    $data = [
                        'dokter_id' => $dokter->id,
                        'hari_id' => $h,
                        'jam_id' => $j
                    ];
                    Jadwal::query()->create($data);
                }
            }
            $result = Dokter::query()->where('id', $dokter->id)->with('spesialis')->first();

            return response()->json($result, 201);
        } catch (\Throwable $th) {
            Log::debug("error", ['message' => $th]);
            $data = [
                'message' => 'gagal menambahkan dokter',
                'error' => $th->getMessage()
            ];

            return response()->json($data, 400);
        }
    }

    public function update(Request $request, Dokter $dokter): JsonResponse
    {
        Log::debug($request->all());
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_sip' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'spesialis_id' => 'required|integer|exists:spesialis,id',
            'tanggal_lahir' => 'required|date',
            'profile_url' => 'required|string',
        ]);

        Log::debug($request);

        try {
            $data = [
                'nama_lengkap' => $request->nama_lengkap,
                'no_sip' => $request->no_sip,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'spesialis_id' => $request->spesialis_id,
                'tanggal_lahir' => $request->tanggal_lahir,
                'profile_url' => $request->profile_url,
            ];
            $dokter->update($data);
            $hari = $request->daftar_hari;
            $jam = $request->daftar_jam;
            foreach ($hari as $h) {
                foreach ($jam as $j) {
                    $data = [
                        'dokter_id' => $dokter->id,
                        'hari_id' => $h,
                        'jam_id' => $j
                    ];
                    Jadwal::query()->create($data);
                }
            }
            $result = Dokter::query()->where('id', $dokter->id)->with('spesialis')->first();

            return response()->json($result, 200);
        } catch (\Throwable $th) {
            Log::debug("error", ['message' => $th]);
            $data = [
                'message' => 'gagal menambahkan dokter',
                'error' => $th->getMessage()
            ];

            return response()->json($data, 400);
        }
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
