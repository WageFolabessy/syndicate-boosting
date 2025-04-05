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
        Schema::create('custom_order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('current_game_rank_category_id');
            $table->unsignedBigInteger('current_game_rank_tier_id');
            $table->unsignedBigInteger('current_game_rank_tier_detail_id');
            $table->unsignedBigInteger('desired_game_rank_category_id');
            $table->unsignedBigInteger('desired_game_rank_tier_id');
            $table->unsignedBigInteger('desired_game_rank_tier_detail_id');

            $table->string('server')->nullable();
            $table->string('login')->nullable();
            $table->text('note')->nullable();
            $table->string('customer_name');
            $table->string('customer_contact');
            $table->string('username');
            $table->string('password');

            $table->integer('price');

            $table->timestamps();

            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->foreign('current_game_rank_category_id')->references('id')->on('game_rank_categories')->onDelete('cascade');
            $table->foreign('current_game_rank_tier_id')->references('id')->on('game_rank_tiers')->onDelete('cascade');
            $table->foreign('current_game_rank_tier_detail_id')->references('id')->on('game_rank_tier_details')->onDelete('cascade');
            $table->foreign('desired_game_rank_category_id')->references('id')->on('game_rank_categories')->onDelete('cascade');
            $table->foreign('desired_game_rank_tier_id')->references('id')->on('game_rank_tiers')->onDelete('cascade');
            $table->foreign('desired_game_rank_tier_detail_id')->references('id')->on('game_rank_tier_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_order_details');
    }
};
