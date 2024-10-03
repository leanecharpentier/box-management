<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BoxFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('fr_FR');
        return [
            'name' => $faker->name(),
            'address' => $faker->streetAddress(),
            'code' => $faker->postcode(),
            'city' => $faker->city(),
            'country' => "France",
            'rent' => $faker->numberBetween(100, 800)
        ];
    }
}
