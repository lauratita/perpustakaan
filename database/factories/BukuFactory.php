<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Buku;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Buku::class;

    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(3),
            'pengarang' => $this->faker->name(),
            'tgl_pembelian' => $this->faker->date(),
            'jumlah' => $this->faker->numberBetween(1, 5),
            'status' => $this->faker->randomElement(['tersedia', 'tidak tersedia']),
        ];
    }
}