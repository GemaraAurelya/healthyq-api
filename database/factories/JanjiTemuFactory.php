<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JanjiTemu>
 */
class JanjiTemuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_lengkap' => $this->faker->name(),
            'no_hp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
            // 'dokter_id' => $this->faker->numberBetween(1, 10),
            'tanggal_janji_temu' => $this->faker->date(),
            'jadwal_id' => $this->faker->numberBetween(1, 15),
        ];
    }
}
