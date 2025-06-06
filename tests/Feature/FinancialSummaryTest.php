<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Bill;

class FinancialSummaryTest extends TestCase
{
    use RefreshDatabase;

    public function test_financial_summary_returns_correct_values()
    {
        Bill::factory()->create(['amount' => 1000]);
        Bill::factory()->create(['amount' => 80]);
        $payload = [
            'money' => [2000],
            'debito' => [100],
            'outros' => [0],
            'savings_limit' => 500,
        ];
        $response = $this->postJson('/api/v1/financial-summary', $payload);
        $response->assertStatus(200)
            ->assertJson([
                'total_expense' => 1080.00,
                'money' => 2000.00,
                'debit' => 100.00,
                'others' => 0.00,
                'total_money' => 2100.00,
                'balance' => 1020.00,
                'savings_balance' => 520.00,
                'can_spend_only' => 500.00,
            ]);
    }

    public function test_financial_summary_handles_empty_arrays()
    {
        Bill::factory()->create(['amount' => 500]);
        $payload = [
            'money' => [0],
            'debito' => [],
            'outros' => [],
            'savings_limit' => 500,
        ];
        $response = $this->postJson('/api/v1/financial-summary', $payload);
        $response->assertStatus(200)
            ->assertJson([
                'total_expense' => 500.00,
                'money' => 0.00,
                'debit' => 0.00,
                'others' => 0.00,
                'total_money' => 0.00,
                'balance' => -500.00,
                'savings_balance' => 0.00,
                'can_spend_only' => -500.00,
            ]);
    }
}
