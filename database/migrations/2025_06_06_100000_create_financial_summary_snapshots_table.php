<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('financial_summary_snapshots', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_expenses');
            $table->decimal('money');
            $table->json('debits')->nullable();
            $table->json('others')->nullable();
            $table->decimal('total_money');
            $table->decimal('balance');
            $table->decimal('savings_balance');
            $table->decimal('can_spend_only');
            $table->decimal('savings_limit')->nullable();
            $table->string('type')->nullable();
            $table->string('month')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('financial_summary_snapshots');
    }
};
