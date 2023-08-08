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
        Schema::table('review_ratings', function (Blueprint $table) {
            //
            $table->renameColumn('email', 'no_telp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('review_ratings', function (Blueprint $table) {
            //
            $table->renameColumn('no_telp', 'email');
        });
    }
};
