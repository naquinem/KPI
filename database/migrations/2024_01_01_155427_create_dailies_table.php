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
        Schema::create('dailies', function (Blueprint $table) {
            $table->id();
            $table->integer('workweek');
            $table->integer('planning_monday')->nullable();
            $table->integer('planning_tuesday')->nullable();
            $table->integer('planning_wednesday')->nullable();
            $table->integer('planning_thursday')->nullable();
            $table->integer('planning_friday')->nullable();
            $table->integer('planning_saturday')->nullable();
            $table->integer('planning_sunday')->nullable();
            $table->integer('output_monday')->nullable();
            $table->integer('output_tuesday')->nullable();
            $table->integer('output_wednesday')->nullable();
            $table->integer('output_thursday')->nullable();
            $table->integer('output_friday')->nullable();
            $table->integer('output_saturday')->nullable();
            $table->integer('output_sunday')->nullable();
            $table->string('percentage_monday')->nullable();
            $table->string('percentage_tuesday')->nullable();
            $table->string('percentage_wednesday')->nullable();
            $table->string('percentage_thursday')->nullable();
            $table->string('percentage_friday')->nullable();
            $table->string('percentage_saturday')->nullable();
            $table->string('percentage_sunday')->nullable();
            $tabel->string('total_percentage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dailies');
    }
};
