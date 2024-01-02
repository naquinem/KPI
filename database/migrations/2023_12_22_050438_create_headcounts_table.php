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
        Schema::create('headcounts', function (Blueprint $table) {
            $table->id();
            $table->integer('workweek')->default(0);
            $table->string('total_output')->default(0);
            $table->string('total_headcounts');
            $table->string('repair_output_per_head')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('headcounts');
    }
};
