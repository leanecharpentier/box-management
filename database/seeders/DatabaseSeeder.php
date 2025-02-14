<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Box;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Toto',
            'email' => 'toto@toto.fr',
            'password' => "toto"
        ])->each(function ($user) {
            Box::factory(10)->state([
                'owner_id' => $user->id
            ])->create();
            Tenant::factory(5)->state([
                'owner_id' => $user->id
            ])->create();
        });

        User::factory()->create([
            'name' => 'Léane',
            'email' => 'leane@example.fr',
            'password' => "leane"
        ])->each(function ($user) {
            Box::factory(10)->state([
                'owner_id' => $user->id
            ])->create();
            Tenant::factory(5)->state([
                'owner_id' => $user->id
            ])->create();
        });
    }
}
