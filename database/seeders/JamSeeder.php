<?php

namespace Database\Seeders;

use App\Models\Jam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jam::factory()->create([
            'nama' => '08:00 - 11:00'
        ]);

        Jam::factory()->create([
            'nama' => '11:00 - 14:00'
        ]);

        Jam::factory()->create([
            'nama' => '14:00 - 17:00'
        ]);

        Jam::factory()->create([
            'nama' => '18:00 - 20:00'
        ]);
    }
}
