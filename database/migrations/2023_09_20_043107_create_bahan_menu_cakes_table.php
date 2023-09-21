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
        Schema::create('bahan_menu_cake', function (Blueprint $table) {
            $table->id();
            // Create foreign key column
            $table->unsignedBigInteger('id_menu');
            $table->unsignedBigInteger('id_bahan');

            // Define foreign key
            $table->foreign('id_menu')->references('id')->on('menu_kue')->onDelete('cascade');
            $table->foreign('id_bahan')->references('id')->on('bahan_baku')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahan_menu_cake');
    }
};
