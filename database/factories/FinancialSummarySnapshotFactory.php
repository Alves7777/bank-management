<?php

namespace Database\Factories;

use App\Models\FinancialSummarySnapshot;
use Illuminate\Database\Eloquent\Factories\Factory;

class FinancialSummarySnapshotFactory extends Factory
{
    protected $model = FinancialSummarySnapshot::class;

    public function definition(): array
    {
        $debits = [
            $this->faker->randomFloat(2, 100, 1000),
            $this->faker->randomFloat(2, 100, 1000),
        ];
        $others = [
            $this->faker->randomFloat(2, 50, 500),
        ];
        $money = $this->faker->randomFloat(2, 1000, 5000);
        $total_expenses = $this->faker->randomFloat(2, 500, 2000);
        $total_money = $money + array_sum($debits) + array_sum($others);
        $can_spend_only = $this->faker->randomFloat(2, 100, 500);
        $balance = $total_money - $total_expenses;
        $savings_balance = $balance - $can_spend_only;
        return [
            'total_expenses' => $total_expenses,
            'money' => $money,
            'debits' => $debits,
            'others' => $others,
            'total_money' => $total_money,
            'balance' => $balance,
            'savings_balance' => $savings_balance,
            'can_spend_only' => $can_spend_only,
        ];
    }
}
