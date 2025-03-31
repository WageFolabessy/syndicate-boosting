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
        Schema::create('game_rank_tiers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_rank_category_id');
            $table->string('tier');
            $table->string('progress_target')->nullable();
            $table->integer('price')->nullable();
            $table->integer('display_order')->default(0);
            $table->timestamps();
            $table->foreign('game_rank_category_id')->references('id')->on('game_rank_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_rank_tiers');
    }
};
