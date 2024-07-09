<?php

namespace Database\Seeders;

use App\Models\Spesialis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpesialisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Spesialis::factory()->create([
            'nama' => 'Dokter Umum'
        ]);

        Spesialis::factory()->create([
            'nama' => 'Dokter Gigi'
        ]);

        Spesialis::factory()->create([
            'nama' => 'Dokter Anak'
        ]);

        Spesialis::factory()->create([
            'nama' => 'Dokter THT'
        ]);

        Spesialis::factory()->create([
            'nama' => 'Dokter Paru-paru'
        ]);

        Spesialis::factory()->create([
            'nama' => 'Dokter Jantung'
        ]);

        Spesialis::factory()->create([
            'nama' => 'Dokter Bedah'
        ]);

        Spesialis::factory()->create([
            'nama' => 'Dokter Psikolog'
        ]);
    }
}
