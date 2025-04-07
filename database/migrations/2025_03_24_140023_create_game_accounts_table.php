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
            $table->string('username');
            $table->string('password');
            $table->string('account_name');
            $table->text('description')->nullable();
            $table->text('features')->nullable();
            $table->integer('original_price');
            $table->integer('sale_price')->nullable();
            $table->string('image');
            $table->string('level')->nullable();
            $table->string('account_age')->nullable();
            $table->boolean('for_sale')->default(true);
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
