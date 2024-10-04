<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TenantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('fr_FR');

        $number = $faker->numerify('## ## ## ##');

        return [
            'lastname' => $faker->lastName(),
            'firstname' => $faker->firstName(),
            'phone' => '06 ' . $number,
            'email' => $faker->email(),
        ];
    }
}
