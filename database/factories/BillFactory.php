<?php

namespace Database\Factories;

use App\Models\Bill;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillFactory extends Factory
{
    protected $model = Bill::class;

    public function definition(): array
    {
        return [
            'month' => $this->faker->monthName(),
            'debited' => $this->faker->boolean(),
            'year' => $this->faker->year(),
            'type' => $this->faker->randomElement(['BOLETO', 'NUBANK', 'CREDICARD', 'RV', 'OUTROS']),
            'description' => $this->faker->sentence(),
            'amount' => $this->faker->randomFloat(2, 10, 2000),
            'status' => $this->faker->randomElement(['PAID', 'PENDING']),
            'notes' => $this->faker->optional()->sentence(),
        ];
    }
}
