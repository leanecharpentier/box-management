<?php

namespace Database\Seeders;

use App\Models\Contract;
use App\Models\ModelContract;
use App\Models\User;
use App\Models\Box;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function generateData($user): void
    {
        Box::factory()->count(10)->create([
            'owner_id' => $user->id
        ]);
        Tenant::factory()->count(5)->create([
            'owner_id' => $user->id
        ]);
        ModelContract::factory()->count(1)->create([
            'user_id' => $user->id
        ]);
    }
    public function run(): void
    {
        $users = [
            ['name' => 'Toto', 'email' => 'toto@toto.fr', 'password' => 'toto'],
            ['name' => 'Léane Charpentier', 'email' => 'leane@example.fr', 'password' => 'leane'],
        ];
        $contracts = [
            ["box_id" => 1, "tenant_id" => 1, "user_id" => 1],
            ["box_id" => 2, "tenant_id" => 2, "user_id" => 1],
            ["box_id" => 11, "tenant_id" => 6, "user_id" => 2],
            ["box_id" => 12, "tenant_id" => 7, "user_id" => 2]
        ];

        foreach ($users as $userData) {
            $user = User::factory()->create($userData);
            $this->generateData($user);
        }
        foreach ($contracts as $contract) {
            Contract::factory()->count(1)->create($contract);
        }
    }
}
