<?php

namespace App\Services;

use App\Models\Bill;

class FinancialSummaryService
{
    public function calculateSummary(array $data): array
    {
        $totalExpense = Bill::sum('amount');
        $money = array_sum($data['money'] ?? []);
        $debit = array_sum($data['debito'] ?? []);
        $others = array_sum($data['outros'] ?? []);
        $totalMoney = $money + $debit + $others;
        $balance = $totalMoney - $totalExpense;
        $savingsLimit = $data['savings_limit'] ?? 500;
        $savingsBalance = $balance > $savingsLimit ? $balance - $savingsLimit : 0;
        $canSpendOnly = $balance > $savingsLimit ? $savingsLimit : $balance;
        return [
            'total_expense' => round($totalExpense, 2),
            'money' => round($money, 2),
            'debit' => round($debit, 2),
            'others' => round($others, 2),
            'total_money' => round($totalMoney, 2),
            'balance' => round($balance, 2),
            'savings_balance' => round($savingsBalance, 2),
            'can_spend_only' => round($canSpendOnly, 2),
        ];
    }
}
