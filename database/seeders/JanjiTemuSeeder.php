<?php

namespace Database\Seeders;

use App\Models\JanjiTemu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JanjiTemuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JanjiTemu::factory(15)->create();
    }
}
