<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('planning_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('workweek');
            $table->integer('planning_monday');
            $table->integer('planning_tuesday');
            $table->integer('planning_wednesday');
            $table->integer('planning_thursday');
            $table->integer('planning_friday');
            $table->integer('planning_saturday');
            $table->integer('planning_sunday');
            $table->integer('output_monday');
            $table->integer('output_tuesday');
            $table->integer('output_wednesday');
            $table->integer('output_thursday');
            $table->integer('output_friday');
            $table->integer('output_saturday');
            $table->integer('output_sunday');
            $table->integer('total_request')->default(0);
            $table->integer('total_output')->default(0);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planning_requests');
    }
};
