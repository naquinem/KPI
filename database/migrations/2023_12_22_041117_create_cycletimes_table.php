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
        Schema::create('cycletimes', function (Blueprint $table) {
            $table->id();
            $table->integer('workweek');
            $table->string('cycletime_monday');
            $table->string('cycletime_tuesday');
            $table->string('cycletime_wednesday');
            $table->string('cycletime_thursday');
            $table->string('cycletime_friday');
            $table->string('cycletime_saturday');
            $table->string('cycletime_sunday');
            $table->string('output_monday')->nullable();
            $table->string('output_tuesday')->nullable();
            $table->string('output_wednesday')->nullable();
            $table->string('output_thursday')->nullable();
            $table->string('output_friday')->nullable();
            $table->string('output_saturday')->nullable();
            $table->string('output_sunday')->nullable();
            $table->string('average_monday')->nullable();
            $table->string('average_tuesday')->nullable();
            $table->string('average_wednesday')->nullable();
            $table->string('average_thursday')->nullable();
            $table->string('average_friday')->nullable();
            $table->string('average_saturday')->nullable();
            $table->string('average_sunday')->nullable();
            $table->integer('total_cycletime')->default(0);
            $table->integer('total_output')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cycletimes');
    }
};
