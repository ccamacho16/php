<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Master;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->city(),
            'country' => Master::where('entity','=','country')->inRandomOrder()->first()->value,
            //'city' => fake()->randomElement(['Santa Cruz','Montero','Warnes','Yapacani','Mineros','Buena Vista']),
            'city' => Master::where('entity','=','city')->inRandomOrder()->first()->value,
            'address' => fake()->streetAddress(),
            'code' => fake()->unixTime(),
            'phones' => fake()->phoneNumber(), 
            'status' => '1'
        ];
    }
}
