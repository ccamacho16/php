<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Master;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tin' => fake()->unixTime(),
            'name' => fake()->company(),
            'address' => fake()->streetAddress(),            
            'city' => Master::where('entity','=','city')->inRandomOrder()->first()->value,
            'phones' => fake()->phoneNumber(), 
            'email' => fake()->unique()->safeEmail(),
            'account' => fake()->randomElement(['Bisa: 654321358', 'Mercantil: 6549874651','Ganadero: 654654687']),
            'contact' => fake()->firstName().' - '.fake()->phoneNumber(), 
            'status' => '1'
            
        ];
    }
}
