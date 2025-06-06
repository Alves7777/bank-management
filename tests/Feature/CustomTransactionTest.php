<?php

namespace Tests\Feature;

use App\Models\Transaction\CustomTransaction;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomTransactionTest extends TestCase
{
    public function test_can_create_custom_transaction()
    {
        $category = Category::firstOrCreate(['name' => 'Alimentação'], ['description' => 'Alimentação']);
        $data = [
            'date' => now()->toDateString(),
            'title' => 'Compra Mercado',
            'amount' => 100.50,
            'month' => '2025-06',
            'category_name' => $category->name,
            'type' => 'NUBANK',
        ];
        $response = $this->postJson('/api/v1/custom-transaction', $data);
        $response->assertStatus(201)->assertJsonFragment(['title' => 'Compra Mercado']);
        $this->assertDatabaseHas('custom_transactions', $data);
    }

    public function test_can_list_custom_transactions()
    {
        CustomTransaction::factory()->count(2)->create([
            'type' => 'NUBANK'
        ]);
        $response = $this->getJson('/api/v1/custom-transaction');
        $response->assertStatus(201)->assertJsonStructure(['data']);
    }

    public function test_can_update_custom_transaction()
    {
        $transaction = CustomTransaction::factory()->create([
            'type' => 'NUBANK'
        ]);
        $response = $this->putJson('/api/v1/custom-transaction/'.$transaction->id, ['title' => 'Nova Descrição']);
        $response->assertStatus(201)->assertJsonFragment(['title' => 'Nova Descrição']);
    }

    public function test_can_delete_custom_transaction()
    {
        $transaction = CustomTransaction::factory()->create([
            'type' => 'NUBANK'
        ]);
        $response = $this->deleteJson('/api/v1/custom-transaction/'.$transaction->id);
        $response->assertStatus(201);
        $this->assertSoftDeleted('custom_transactions', ['id' => $transaction->id]);
    }
}
