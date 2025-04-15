<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('bin_levels', function (Blueprint $table) {
            // First convert existing string values to integers
            DB::statement('UPDATE bin_levels SET plastic_level = CAST(plastic_level AS UNSIGNED)');
            DB::statement('UPDATE bin_levels SET paper_level = CAST(paper_level AS UNSIGNED)');
            DB::statement('UPDATE bin_levels SET metal_level = CAST(metal_level AS UNSIGNED)');

            // Then change column types
            $table->integer('plastic_level')->change();
            $table->integer('paper_level')->change();
            $table->integer('metal_level')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bin_levels', function (Blueprint $table) {
            $table->string('plastic_level')->change();
            $table->string('paper_level')->change();
            $table->string('metal_level')->change();
        });
    }
};
