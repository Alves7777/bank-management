<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\FinancialSummarySnapshot;

class FinancialSummarySnapshotTest extends TestCase
{
    public function test_can_create_financial_summary_snapshot()
    {
        $payload = [
            'total_expenses' => 1500.00,
            'money' => 2000.00,
            'debits' => [300.00, 200.00],
            'others' => [100.00],
            'can_spend_only' => 500.00,
        ];

        $response = $this->postJson('/api/v1/financial-summary-snapshots', $payload);
        $response->assertStatus(201)
            ->assertJsonFragment([
                'total_expenses' => '1500.00',
                'money' => '2000.00',
                'can_spend_only' => '500.00',
            ]);
        $this->assertDatabaseHas('financial_summary_snapshots', [
            'total_expenses' => 1500.00,
            'money' => 2000.00,
            'can_spend_only' => 500.00,
        ]);
    }

    public function test_can_list_financial_summary_snapshots()
    {
        FinancialSummarySnapshot::factory()->count(2)->create();
        $response = $this->getJson('/api/v1/financial-summary-snapshots');
        $response->assertStatus(200)
            ->assertJsonCount(2);
    }

    public function test_validation_errors_on_create()
    {
        $response = $this->postJson('/api/v1/financial-summary-snapshots', []);
        $response->assertStatus(422)
            ->assertJsonValidationErrors(['total_expenses', 'money', 'can_spend_only']);
    }
}
