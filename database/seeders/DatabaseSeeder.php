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
        Box::factory(10)->create()->each(function ($box) {
            $tenant = Tenant::factory()->state([
                'box_id' => $box->id
            ])->create();
            $box->update([
                'tenant_id' => $tenant->id
            ]);
        });
    }
}
