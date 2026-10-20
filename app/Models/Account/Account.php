<?php

namespace App\Models\Account;

use App\Models\Transaction\Transaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'account_number', 'account_number');
    }
}
