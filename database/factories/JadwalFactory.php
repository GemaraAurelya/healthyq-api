<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jadwal>
 */
class JadwalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dokter_id' => $this->faker->numberBetween(1, 10),
            'hari_id' => $this->faker->numberBetween(1, 7),
            'jam_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}
