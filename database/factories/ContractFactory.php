<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "start_date" => "2025-01-01",
            "end_date" => "2026-01-01",
            "monthly_price" => 500,
            "box_id" => 1,
            "tenant_id" => 1,
            "model_contract_id" => 1,
            "user_id" => 1
        ];
    }
}
