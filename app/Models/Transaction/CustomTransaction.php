<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'custom_transactions';
    protected $guarded = ['id'];
    protected $fillable = [
        'date', 'title', 'amount', 'month', 'category_name'
    ];
}
