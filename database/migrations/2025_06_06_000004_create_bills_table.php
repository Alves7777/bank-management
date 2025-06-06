<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('month', 20);
            $table->boolean('debited');
            $table->year('year');
            $table->string('type');
            $table->string('description', 255)->nullable();
            $table->decimal('amount', 15, 2);
            $table->enum('status', ['PAID', 'PENDING'])->default('PENDING');
            $table->string('notes', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
