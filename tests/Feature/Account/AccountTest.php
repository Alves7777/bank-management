<?php

namespace Tests\Feature\Account;

use App\Models\Account\Account;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccountTest extends TestCase
{
//    use RefreshDatabase;

    private function accountNumber(): int
    {
        do {
            $accountNumber = mt_rand(10000000, 99999999);
        } while (Account::where('account_number', $accountNumber)->exists());

        return $accountNumber;
    }

    public function test_transaction_created_account_success()
    {
        $response = $this->post('/api/v1/account', [
            'account_number' => $this->accountNumber(),
            'balance' => 100.00,
        ]);

        $response->assertStatus(201);
        $response->assertCreated();
    }

    public function test_error_request_exists_account()
    {
        $response = $this->post('/api/v1/account', [
            'account_number' => Account::find(1)->account_number,
            'balance' => 100.00,
        ]);
        $response->assertStatus(404);
        $response->assertJson([
            "status" => "Fail",
            "message" => "O campo account number já está sendo utilizado."
        ]);
    }

    public function test_error_request_exists_parameter_balance()
    {
        $response = $this->post('/api/v1/account', [
            'account_number' => $this->accountNumber()
        ]);
        $response->assertStatus(404);
        $response->assertJson([
            "status" => "Fail",
            "message" => "O campo balance é obrigatório."
        ]);
    }

    public function test_error_request_exists_parameter_account_number()
    {
        $response = $this->post('/api/v1/account', [
            'balance' => 100.00
        ]);
        $response->assertStatus(404);
        $response->assertJson([
            "status" => "Fail",
            "message" => "O campo account number é obrigatório."
        ]);
    }

    public function test_account_retrieval_error_account_not_found()
    {
        $response = $this->get('/api/v1/account?account_number=999');

        $response->assertStatus(404);
        $response->assertJson([
            "status" => "Fail",
            "message" => "Número da conta não cadastrado."
        ]);
    }
}

