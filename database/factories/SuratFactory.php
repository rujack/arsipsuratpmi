<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Surat>
 */
class SuratFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'no_surat' => fake()->unique($reset = true)->randomNumber(9, false),
            'tipe_surat' => mt_rand(0, 1),
            'pengajuan' => mt_rand(0, 1),
            'perihal' => fake()->sentence(),
            'tanggal' => fake()->date('Y-m-d', 'now'),
            'pengirim' => fake()->name(),
            'penerima' => fake()->name(),
            'file' => fake()->fileExtension(),
        ];
    }
}
