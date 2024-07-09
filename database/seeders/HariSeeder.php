<?php

namespace Database\Seeders;

use App\Models\Hari;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hari::factory()->create([
            'nama' => 'Senin'
        ]);

        Hari::factory()->create([
            'nama' => 'Selasa'
        ]);

        Hari::factory()->create([
            'nama' => 'Rabu'
        ]);

        Hari::factory()->create([
            'nama' => 'Kamis'
        ]);

        Hari::factory()->create([
            'nama' => 'Jumat'
        ]);

        Hari::factory()->create([
            'nama' => 'Sabtu'
        ]);

        Hari::factory()->create([
            'nama' => 'Minggu'
        ]);
    }
}
