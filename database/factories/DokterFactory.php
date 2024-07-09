<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dokter>
 */
class DokterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomProfile = $this->faker->numberBetween(1, 4);
        return [
            'nama_lengkap' => fake()->name,
            'no_sip' => $this->faker->bothify('###/####/x/2014'),
            'no_hp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
            'spesialis_id' => $this->faker->numberBetween(1, 8),
            'tanggal_lahir' => $this->faker->date(),
            'profile_url' => Storage::disk('directly_to_public')->url("/dokter/dokter_$randomProfile.png")
        ];
    }
}
