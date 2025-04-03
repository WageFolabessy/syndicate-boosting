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
        Schema::create('account_order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('game_account_id');

            $table->string('customer_name');
            $table->string('customer_contact');

            $table->integer('price');

            $table->timestamps();

            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->foreign('game_account_id')->references('id')->on('game_accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_order_details');
    }
};
