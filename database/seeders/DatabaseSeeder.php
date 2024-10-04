<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Box;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Pierre',
            'email' => 'pierre@example.com',
        ]);
        User::factory()->create([
            'name' => 'Paul',
            'email' => 'paul@example.com',
        ]);
        User::factory()->create([
            'name' => 'Jacques',
            'email' => 'jacques@example.com',
        ]);

        User::factory(10)->create();
        Box::factory(10)->create();
    }
}
