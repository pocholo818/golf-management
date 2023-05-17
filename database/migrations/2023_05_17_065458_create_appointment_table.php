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
        Schema::create('appointment', function (Blueprint $table) {
            $table->id('app_id');
            $table->string('name');
            $table->string('member_name');
            $table->string('account_code');
            $table->string('capacity');
            $table->integer('user_id');
            $table->string('date');
            $table->string('time');
            $table->string('guests');
            $table->string('price');
            $table->string('type')->default('appointment');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment');
    }
};
