<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'artist' => $this->faker->word(),
            'title' => $this->faker->words(3, true),
            'price' => rand(100,999),
            'product_type_id' => rand(1,3),

        ];
    }
}