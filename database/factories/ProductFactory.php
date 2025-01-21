<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

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
        $name = fake()->unique()->word();
        return [
            'code' => fake()->unixTime(),            
            'name' => $name,
            'tradename' => $name,
            'description' => fake()->sentence(),
            'brand' => fake()->company(),
            'quantity_min' => fake()->numberBetween(1,20),
            'quantity_max' => fake()->numberBetween(20,90),
            'barcode' => fake()->numberBetween(1000,9999),
            'category_id' => Category::query()->inRandomOrder()->first()->id, 
            'status' => 1
        ];
    }
}
