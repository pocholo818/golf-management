<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Invoice', function (Blueprint $table) {
            $table->id('invoice_id');
            $table->string('invoice_number');
            $table->string('customer_id');
            $table->string('member_name')->nullable();
            $table->string('type')->nullable();
            $table->string('amount')->nullable();
            $table->decimal('total', 25, 2);
            $table->string('remarks')->nullable();
            $table->string('status')->default('unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Invoice');
    }
};
