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
        Schema::create('boosting_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id');
            // Tipe layanan: individual (satuan) atau package (paket)
            $table->enum('service_type', ['custom', 'package'])->default('custom');
            $table->text('description')->nullable();
            $table->integer('original_price');
            $table->integer('sale_price')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boosting_services');
    }
};
