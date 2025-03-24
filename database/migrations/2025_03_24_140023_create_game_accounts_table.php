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
        Schema::create('game_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id');
            $table->string('account_name'); // judul produk akun
            $table->string('subtitle')->nullable(); // misal: "Mythical Glory" atau "Akun AR 60 Whale"
            $table->text('description')->nullable();
            $table->text('features')->nullable();
            $table->integer('original_price');
            $table->integer('sale_price')->nullable();
            $table->string('image')->nullable();
            // Level akun (misal: 85)
            $table->integer('level')->nullable();
            // Lama akun, misal: "2+ Tahun"
            $table->string('account_age')->nullable();
            $table->timestamps();
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_accounts');
    }
};
