<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_product' => $this->faker->word,
            'harga' => $this->faker->numberBetween(1000, 10000),
            'deskripsi' => $this->faker->paragraph,
            'link_shopee' => $this->faker->url,
            'stok' => $this->faker->numberBetween(1, 1000),
            'tersedia' => 1,
            'spesifikasi_product' => $this->faker->paragraph,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
