<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialSummarySnapshot extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_expenses',
        'money',
        'debits',
        'others',
        'total_money',
        'balance',
        'savings_balance',
        'can_spend_only',
        'savings_limit',
        'type',
        'month',
    ];

    protected $casts = [
        'debits' => 'array',
        'others' => 'array',
        'total_expenses' => 'decimal:2',
        'money' => 'decimal:2',
        'total_money' => 'decimal:2',
        'balance' => 'decimal:2',
        'savings_balance' => 'decimal:2',
        'can_spend_only' => 'decimal:2',
        'savings_limit' => 'decimal:2',
        'type' => 'string',
        'month' => 'string',
    ];
}
