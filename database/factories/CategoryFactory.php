<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categories = [
            'Isotonicos',
            'Energizantes',
            'Suplementos',
            'Proteinas',
            'Gaseosas',
            'Golosinas',
            'Herbalife',
        ];
        return [
            'name' =>  fake()->unique()->randomElement($categories),
            'description' => fake()->paragraph(1),
            'status' => '1'
        ];
    }
}
