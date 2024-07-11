<?php

namespace App\Http\Controllers;

use App\Models\JanjiTemu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JanjiTemuController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $janjiTemu = JanjiTemu::query()->with('jadwal', 'jadwal.dokter')->get();
        $result = $janjiTemu->map(function ($item) {
            return [
                'id' => $item->id,
                'nama_lengkap' => $item->nama_lengkap,
                'no_hp' => $item->no_hp,
                'alamat' => $item->alamat,
                'tanggal_janji_temu' => $item->tanggal_janji_temu,
                'status' => $item->status,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
                'jadwal_id' => $item->jadwal_id,
                'dokter_id' => $item->jadwal->dokter->id,
                'dokter_nama' => $item->jadwal->dokter->nama_lengkap,
                'hari_id' => $item->jadwal->hari->id,
                'hari_nama' => $item->jadwal->hari->nama,
                'jam_id' => $item->jadwal->jam->id,
                'jam_nama' => $item->jadwal->jam->nama,
            ];
        });
        return response()->json($result);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tanggal_janji_temu' => 'required|date',
            'jadwal_id' => 'required|integer|exists:jadwals,id',
        ]);

        try {
            $result = JanjiTemu::query()->create($request->all());
            $result = JanjiTemu::query()->with('jadwal', 'jadwal.dokter')->find($result->id);
            $janjiTemu = [
                'id' => $result->id,
                'nama_lengkap' => $result->nama_lengkap,
                'no_hp' => $result->no_hp,
                'alamat' => $result->alamat,
                'tanggal_janji_temu' => $result->tanggal_janji_temu,
                'status' => $result->status,
                'created_at' => $result->created_at,
                'updated_at' => $result->updated_at,
                'jadwal_id' => $result->jadwal_id,
                'dokter_id' => $result->jadwal->dokter->id,
                'dokter_nama' => $result->jadwal->dokter->nama_lengkap,
                'hari_id' => $result->jadwal->hari->id,
                'hari_nama' => $result->jadwal->hari->nama,
                'jam_id' => $result->jadwal->jam->id,
                'jam_nama' => $result->jadwal->jam->nama,
            ];

            return response()->json($janjiTemu, 201);
        } catch (\Throwable $th) {
            $data = [
                'message' => 'gagal menambahkan janji temu',
                'error' => $th->getMessage()
            ];

            return response()->json($data, 400);
        }
    }

    public function ubahStatus(Request $request, $janjiTemuId): JsonResponse
    {
        $request->validate([
            'status' => 'required|boolean'
        ]);

        try {
            $janjiTemu = JanjiTemu::query()->with('jadwal', 'jadwal.dokter')->find($janjiTemuId);
            $janjiTemu->status = $request->status;
            $janjiTemu->save();

            $result = [
                'id' => $janjiTemu->id,
                'nama_lengkap' => $janjiTemu->nama_lengkap,
                'no_hp' => $janjiTemu->no_hp,
                'alamat' => $janjiTemu->alamat,
                'tanggal_janji_temu' => $janjiTemu->tanggal_janji_temu,
                'status' => $janjiTemu->status,
                'created_at' => $janjiTemu->created_at,
                'updated_at' => $janjiTemu->updated_at,
                'jadwal_id' => $janjiTemu->jadwal_id,
                'dokter_id' => $janjiTemu->jadwal->dokter->id,
                'dokter_nama' => $janjiTemu->jadwal->dokter->nama_lengkap,
                'hari_id' => $janjiTemu->jadwal->hari->id,
                'hari_nama' => $janjiTemu->jadwal->hari->nama,
                'jam_id' => $janjiTemu->jadwal->jam->id,
                'jam_nama' => $janjiTemu->jadwal->jam->nama,
            ];

            return response()->json($result);
        } catch (\Throwable $th) {
            $data = [
                'message' => 'gagal update status janji temu',
                'error' => $th->getMessage()
            ];
            Log::debug('gagal update', ['data' => $data]);
            return response()->json($data);
        }
    }
}
