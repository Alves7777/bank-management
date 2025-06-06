<?php

namespace App\Services;

use App\Models\Bill;

class FinancialSummaryService
{
    public function calculateSummary(array $data): array
    {
        $billsTotal = Bill::when(isset($data['type']), fn($q) => $q->where('type', $data['type']))
            ->when(isset($data['month']), fn($q) => $q->where('month', $data['month']))
            ->sum('amount');
        $customTransactionsTotal = app(\App\Models\Transaction\CustomTransaction::class)
            ::when(isset($data['type']), fn($q) => $q->where('type', $data['type']))
            ->when(isset($data['month']), fn($q) => $q->where('month', $data['month']))
            ->sum('amount');
        $totalExpense = $billsTotal + $customTransactionsTotal;
        $money = array_sum($data['money'] ?? []);
        $debit = array_sum($data['debit'] ?? []);
        $others = array_sum($data['others'] ?? []);
        $totalMoney = $money + $debit + $others;
        $balance = $totalMoney - $totalExpense;
        $savingsLimit = $data['savings_limit'] ?? 500;
        $savingsBalance = $balance > $savingsLimit ? $balance - $savingsLimit : 0;
        $canSpendOnly = $balance > $savingsLimit ? $savingsLimit : $balance;

        // Salvar snapshot
        \App\Models\FinancialSummarySnapshot::create([
            'total_expenses' => $totalExpense,
            'money' => $money,
            'debits' => $data['debit'] ?? [],
            'others' => $data['others'] ?? [],
            'total_money' => $totalMoney,
            'balance' => $balance,
            'savings_balance' => $savingsBalance,
            'can_spend_only' => $canSpendOnly,
            'savings_limit' => $savingsLimit,
            'type' => $data['type'] ?? null,
            'month' => $data['month'] ?? null,
        ]);

        return [
            'total_expense' => round($totalExpense, 2),
            'total_bills' => round($billsTotal, 2),
            'total_custom_transactions' => round($customTransactionsTotal, 2),
            'money' => round($money, 2),
            'debit' => round($debit, 2),
            'others' => round($others, 2),
            'total_money' => round($totalMoney, 2),
            'balance' => round($balance, 2),
            'savings_balance' => round($savingsBalance, 2),
            'can_spend_only' => round($canSpendOnly, 2),
            'type' => $data['type'] ?? null,
            'month' => $data['month'] ?? null,
        ];
    }
}
