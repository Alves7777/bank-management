<?php

namespace App\Models\Transaction;

use App\Models\Account\Account;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_number', 'account_number');
    }
}
