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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            // Nomor transaksi unik dengan prefix misal: boost-xxxxxxxxxxx atau acc-xxxxxxxxxx
            $table->string('transaction_number')->unique();
            // Relasi polymorphic ke produk (BoostingService atau GameAccount)
            $table->unsignedBigInteger('transactionable_id');
            $table->string('transactionable_type');
            // Data pelanggan
            $table->string('customer_name')->nullable();
            $table->string('customer_contact')->nullable();
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
