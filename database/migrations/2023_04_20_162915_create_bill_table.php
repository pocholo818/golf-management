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
        Schema::create('bill', function (Blueprint $table) {
            $table->id('bill_id');
            $table->string('bill_code'); //10digits random too -- specific for bill
            $table->bigInteger('user_id')->nullable(); //for admin id (kiosk, finance, merchandiser)
            $table->string('account_id'); //reference the member account id //the 10random digit
            $table->string('appointment_id')->nullable(); //once approved, create record in bill
            $table->string('type'); //appointment, kiosk, if customer book appointment, type = appointment, if kiosk = kiosk
            $table->decimal('total', 25, 2);
            $table->string('status')->default('Pending');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill');
    }
};
