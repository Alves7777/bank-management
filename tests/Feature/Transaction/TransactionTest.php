<?php

namespace Tests\Feature\Transaction;

use App\Models\Account\Account;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionTest extends TestCase
{
    private function createAccount()
    {
        do {
            $accountNumber = mt_rand(10000000, 99999999);
        } while (Account::where('account_number', $accountNumber)->exists());

        return Account::create([
            'account_number' => $accountNumber,
            'balance' => 100.00,
        ]);
    }

    public function test_transaction_credit_success()
    {
        $account = $this->createAccount();

        $response = $this->postJson('/api/v1/transaction', [
            'payment_method' => 'C',
            'account_number' => $account->account_number,
            'value' => 2.00,
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('transactions', [
            'account_number' => $account->account_number,
            'value' => 2.10,
        ]);
    }

    public function test_transaction_debit_success()
    {
        $account = $this->createAccount();

        $response = $this->post('/api/v1/transaction', [
            'payment_method' => 'D',
            'account_number' => $account->account_number,
            'value' => 2.00,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('transactions', [
            'account_number' => $account->account_number,
            'value' => 2.06,
        ]);
    }

    public function test_transaction_pix_success()
    {
        $account = $this->createAccount();

        $response = $this->post('/api/v1/transaction', [
            'payment_method' => 'P',
            'account_number' => $account->account_number,
            'value' => 20.00,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('transactions', [
            'account_number' => $account->account_number,
            'value' => 20.00,
        ]);
    }

    public function test_transaction_creation_error_insufficient_funds()
    {
        $account = $this->createAccount();

        $response = $this->postJson('/api/v1/transaction', [
            'payment_method' => 'D',
            'account_number' => $account->account_number,
            'value' => 200.00,
        ]);

        $balanceFormatted = number_format($account->balance, 2, ',', '.');

        $response->assertStatus(404);
        $response->assertJson([
            'message' => "Saldo insuficiente para realizar transação. Saldo: R$ {$balanceFormatted}",
        ]);
    }

    public function test_transaction_error_parameter_payment_method_required()
    {
        $response = $this->post('/api/v1/transaction', [
            'account_number' => $this->createAccount()->account_number,
            'value' => 2.00,
        ]);

        $response->assertStatus(404);
        $response->assertJson([
            'message' => 'O campo payment method é obrigatório.',
        ]);
    }

    public function test_transaction_error_parameter_payment_method_type()
    {
        $response = $this->post('/api/v1/transaction', [
            "payment_method" => 'Débito',
            'account_number' => $this->createAccount()->account_number,
            'value' => 2.00,
        ]);

        $response->assertStatus(404);
        $response->assertJson([
            'message' => 'O método de pagamento deve ser um dos seguintes: P: PIX, C: CREDIT_CARD, D: DEBIT_CARD',
        ]);
    }

    public function test_transaction_error_parameter_account_number_required()
    {
        $response = $this->post('/api/v1/transaction', [
            "payment_method" => 'D',
            'value' => 2.00,
        ]);

        $response->assertStatus(404);
        $response->assertJson([
            'message' => 'O campo account number é obrigatório.',
        ]);
    }

    public function test_transaction_error_parameter_account_number_unique()
    {
        $response = $this->post('/api/v1/transaction', [
            "payment_method" => 'D',
            "account_number" => 'teste',
            'value' => 2.00,
        ]);

        $response->assertStatus(404);
        $response->assertJson([
            'message' => 'O campo account number selecionado é inválido.',
        ]);
    }

    public function test_transaction_error_parameter_value_required()
    {
        $response = $this->post('/api/v1/transaction', [
            "payment_method" => 'D',
            'account_number' => $this->createAccount()->account_number
        ]);

        $response->assertStatus(404);
        $response->assertJson([
            'message' => 'O campo value é obrigatório.',
        ]);
    }

    public function test_transaction_error_parameter_value_numeric()
    {
        $response = $this->post('/api/v1/transaction', [
            "payment_method" => 'D',
            'account_number' => $this->createAccount()->account_number,
            'value' => 'teste',
        ]);

        $response->assertStatus(404);
        $response->assertJson([
            'message' => 'O campo value deve ser um número.O campo value deve ser maior que 0.',
        ]);
    }

    public function test_transaction_error_parameter_value_positive()
    {
        $response = $this->post('/api/v1/transaction', [
            "payment_method" => 'D',
            'account_number' => $this->createAccount()->account_number,
            'value' => -1.55,
        ]);

        $response->assertStatus(404);
        $response->assertJson([
            'message' => 'O campo value deve ser maior que 0.',
        ]);
    }

}

