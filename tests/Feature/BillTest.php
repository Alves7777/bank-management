<?php

namespace Tests\Feature;

use App\Models\Bill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BillTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_bill()
    {
        $data = [
            'month' => 'June',
            'debited' => true,
            'year' => 2025,
            'type' => 'BOLETO',
            'description' => 'Luz',
            'amount' => 10.00,
            'status' => 'PAID',
            'notes' => null,
        ];
        $response = $this->postJson('/api/v1/bill', $data);
        $response->assertStatus(201)->assertJsonFragment(['description' => 'Luz']);
        $this->assertDatabaseHas('bills', $data);
    }

    public function test_can_list_bills()
    {
        Bill::factory()->count(2)->create();
        $response = $this->getJson('/api/v1/bill');
        $response->assertStatus(200)->assertJsonStructure(['data']);
    }

    public function test_can_update_bill()
    {
        $bill = Bill::factory()->create();
        $response = $this->putJson('/api/v1/bill/'.$bill->id, ['description' => 'Água', 'status' => 'PENDING']);
        $response->assertStatus(200)->assertJsonFragment(['description' => 'Água']);
    }

    public function test_can_delete_bill()
    {
        $bill = Bill::factory()->create();
        $response = $this->deleteJson('/api/v1/bill/'.$bill->id);
        $response->assertStatus(200);
        $this->assertSoftDeleted('bills', ['id' => $bill->id]);
    }
}
