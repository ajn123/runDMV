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
        Schema::table('races', function (Blueprint $table) {
            $table->boolean('enabled')->default(true);
        });

        Schema::table('clubs', function (Blueprint $table) {
            $table->boolean('enabled')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('races', function (Blueprint $table) {
            $table->dropColumn('enabled');
        });

        Schema::table('clubs', function (Blueprint $table) {
            $table->dropColumn('enabled');
        });
    }
};
