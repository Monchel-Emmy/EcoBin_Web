<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bin_levels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bin_id')->constrained('bins')->onDelete('cascade');
            $table->date('date');
            $table->integer('plastic_level');
            $table->integer('paper_level');
            $table->integer('metal_level');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bin_levels');
    }
}; 