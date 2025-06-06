<?php

namespace Database\Factories\Transaction;

use App\Models\Transaction\CustomTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomTransactionFactory extends Factory
{
    protected $model = CustomTransaction::class;

    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'title' => $this->faker->sentence(3),
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'month' => $this->faker->monthName(),
            'category_name' => null,
        ];
    }
}
