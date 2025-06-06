<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('custom_transactions', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('title');
            $table->decimal('amount');
            $table->string('month');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('custom_transactions');
    }
};
