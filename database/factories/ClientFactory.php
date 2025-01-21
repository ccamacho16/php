<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Master;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'dni' => fake()->unixTime(),
            //'city' => fake()->randomElement(['SRZ', 'CBB','LPZ']),
            //'city' => $faker->city,
            'sex' => fake()->randomElement(['Masculino', 'Femenino']),
            'birth_date' => fake()->dateTimeThisMonth()->format('Y-m-d'),
            'name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'home_address' => fake()->streetAddress(),
            'business_address' => fake()->streetAddress(),
            'phones' => fake()->phoneNumber(), 
            'email' => fake()->unique()->safeEmail(),
            'job' => Master::where('entity','=','job')->inRandomOrder()->first()->value,
            'status' => '1'
            
            // 'CompanyName' => $faker->company
        ];
    }
}
