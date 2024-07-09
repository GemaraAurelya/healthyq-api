<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\HariController;
use App\Http\Controllers\JamController;
use App\Http\Controllers\JanjiTemuController;
use App\Http\Controllers\SpesialisController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\JadwalController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::resource('dokter', DokterController::class);
Route::get('dokter/{dokterId}/jadwal', [JadwalController::class, 'getByDokterId']);
Route::resource('spesialis', SpesialisController::class);
Route::resource('hari', HariController::class);
Route::resource('jam', JamController::class);
Route::resource('janji-temu', JanjiTemuController::class);
Route::put('janji-temu/{janjiTemuId}/status', [JanjiTemuController::class, 'ubahStatus']);
Route::post('/upload', [FileController::class, 'upload']);

Route::get('/hi', function () {
    return response()->json(['message' => 'Hello, World!']);
});
