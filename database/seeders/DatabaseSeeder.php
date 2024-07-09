<?php

namespace Database\Seeders;

use App\Models\JanjiTemu;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            SpesialisSeeder::class,
            HariSeeder::class,
            JamSeeder::class,
            DokterSeeder::class,
            JadwalSeeder::class,
            JanjiTemuSeeder::class
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role_id' => 1
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'role_id' => 2
        ]);
    }
}
